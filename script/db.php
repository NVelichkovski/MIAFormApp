<?php
require_once "variables.php";

$conn=new mysqli("localhost","root", "", "formappdatabase");
if ($conn->connect_error) {
    die("Connection field: ".$conn->connect_error);
}

function closeConnection(){
    mysqli_close($GLOBALS['conn']);
}

function addUser(string $email, string $username, string $name, string $password)
{   $addUserStmt=$GLOBALS['conn']->prepare("INSERT INTO users (email, username, name, password, hash_id) VALUES (?, ?, ?, ?, ?)");
    $hash_id=uniqid($email);
    $hash_id=hash('sha256',$hash_id);
    $addUserStmt->bind_param("sssss", $email, $username, $name, $password, $hash_id);
    $addUserStmt->execute();
    $addUserStmt->close();

}

function isEmailUniqe($email)
{
    $getRowsByEmailStmt=$GLOBALS['conn']->prepare("SELECT * FROM users WHERE email=?");
    $getRowsByEmailStmt->bind_param("s",$email);
    $getRowsByEmailStmt->execute();
    $rez=$getRowsByEmailStmt->get_result();
   if (mysqli_num_rows($rez)>0) {
       $return=FALSE;
   }
   else $return=TRUE;
   $getRowsByEmailStmt->close();
   return $return;
}

function isUsernameUnique($username)
{
    $getRowsByUsernameStmt=$GLOBALS['conn']->prepare("SELECT * FROM users WHERE username=?");
    $getRowsByUsernameStmt->bind_param("s",$username);
   $getRowsByUsernameStmt->execute();
   $rez=$getRowsByUsernameStmt->get_result();
   if (mysqli_num_rows($rez)>0) {
       $return= FALSE;
   }
   else $return= TRUE;
   $getRowsByUsernameStmt->close();
   return $return;
}
function getRowByUsername($username)
{
    $getRowsByUsernameStm=$GLOBALS['conn']->prepare("SELECT * FROM users WHERE username=?");
    $getRowsByUsernameStm->bind_param("s",$username);
    $getRowsByUsernameStm->execute();
    return  mysqli_fetch_assoc($getRowsByUsernameStm->get_result());
//    $getRowsByUsernameStm->close();
//    return $return;
}

function getRowByEmail($email)
{
    $getRowByEmailStmt=$GLOBALS['conn']->prepare("SELECT * FROM users WHERE email=?");
    $getRowByEmailStmt->bind_param("s",$email);
    $getRowByEmailStmt->execute();
    $return = mysqli_fetch_assoc($getRowByEmailStmt->get_result());
    $getRowByEmailStmt->close();
    return $return;
}
function createFormsTable($username)
{
    //CREATE TABLE `formappdatabase`.`form_table_sample` ( `id` INT NOT NULL AUTO_INCREMENT ,  `title` INT NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = MyISAM;
    $id=getRowByUsername($username)['id'];
    $sql="CREATE TABLE `formappdatabase`.`form_table_{$id}` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,  `form-title` VARCHAR(100) NOT NULL ,  `hash-id` VARCHAR(130) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  (`hash-id`)) ENGINE = MyISAM";
    // $sql="CREATE TABLE form_table_{$id} (formName VARCHAR(100), id INT(11) )";
    $GLOBALS['conn']->query($sql);
}

function usernameAndPasswordMatch($username, $password)
{
    $row=getRowByUsername($username);
        if($row && password_verify($password, $row['password'])) {
            return TRUE;
        }
        return FALSE;    
}

function emailAndPasswordMatch($email, $password)
{
    $row=getRowByEmail($email);
    if ($row) {
        if(password_verify($password, $row['password'])) {
            return TRUE;
        }
    }
        return FALSE; 
    
}
function getRowByRememberMeToken($token){
    $updateRememberMeTokenStmt=$GLOBALS['conn']->prepare("SELECT * FROM users WHERE token=?");
    $updateRememberMeTokenStmt->bind_param("s", $token);
    $updateRememberMeTokenStmt->execute();
    $rez=$updateRememberMeTokenStmt->get_result();
    $return= mysqli_fetch_assoc($rez);
    $updateRememberMeTokenStmt->close();
    return $return;
}
function updateRememberMeToken($id, $token){
    $updateRememberMeTokenStmt=$GLOBALS['conn']->prepare("UPDATE users SET token=? WHERE id=?");
    $updateRememberMeTokenStmt->bind_param("ss",$token, $id);
    $updateRememberMeTokenStmt->execute();
   if (mysqli_error($GLOBALS['conn'])) {
       $return = mysqli_error($GLOBALS['conn']);
   } else
   {
        $return = false;
    }
    $updateRememberMeTokenStmt-> close();
   return $return;
}

function removeRememberMeToken($id)
{
    //Brishe tokenot od users tabelata. Dokolku tokenot e uspeshno izvrshen
    //se vrakja false, vo sporotivno se vrakje errorot
    $setRememberMeTokenToNullStmt=$GLOBALS['conn']->prepare("UPDATE users SET token = NULL WHERE id = ?");
    $setRememberMeTokenToNullStmt->bind_param("s", $id);
    $setRememberMeTokenToNullStmt->execute();
    if (mysqli_error($GLOBALS['conn'])) {
        $return= mysqli_error($GLOBALS['conn']);
    }
    else $return=false;
    $setRememberMeTokenToNullStmt->close();
    return $return;
}

function updateForgotPasswordToken($id,$token){
    $updateForgotPasswordTokenStmt=$GLOBALS['conn']->prepare("UPDATE users SET forgot-password-token=? WHERE id=?");
    $updateForgotPasswordTokenStmt->bind_param("ss",$token, $id);
    $updateForgotPasswordTokenStmt->execute();
    if (mysqli_error($GLOBALS['conn'])) {
        $return = mysqli_error($GLOBALS['conn']);
    } else
    {
        $return = false;
    }
    $updateForgotPasswordTokenStmt-> close();
    return $return;
}
function updatePassword($id, $password){
    $hash=password_hash($password, PASSWORD_BCRYPT);
    $updatePasswordHashStmt=$GLOBALS['conn']->prepare("UPDATE users SET password=? WHERE id=?");
    $updatePasswordHashStmt->bind_param("ss", $hash, $id);
    $updatePasswordHashStmt->exicute();
    if (mysqli_error($GLOBALS['conn'])) {
        $return = mysqli_error($GLOBALS['conn']);
    } else
    {
        $return = false;
    }
    $updatePasswordHashStmt->close();
    return $return;
}

function updateName($id, $name){
    $updateNameStmt=$GLOBALS['conn']->prepare("UPDATE users SET name=? WHERE id=?");
    $updateNameStmt->bind_param("ss", $name, $id);
    $updateNameStmt->exicute();
    if (mysqli_error($GLOBALS['conn'])) {
        $return = mysqli_error($GLOBALS['conn']);
    } else
    {
        $return = false;
    }
    $updateNameStmt->close();
    return $return;
}

function updateEmail($id, $email){
    $updateEmailStmt=$GLOBALS['conn']->prepare("UPDATE users SET name=? WHERE id=?");
    $updateEmailStmt->bind_param("ss", $email, $id);
    $updateEmailStmt->exicute();
    if (mysqli_error($GLOBALS['conn'])) {
        $return = mysqli_error($GLOBALS['conn']);
    } else
    {
        $return = false;
    }
    $updateEmailStmt->close();
    return $return;
}

function addForm($userId, $title){
    if ($addFormStmt=$GLOBALS['conn']->prepare("INSERT INTO `form_table_{$userId}` ( `form-title`, `hash-id` )
    VALUES (?, ?)")) {
    $hash_id=uniqid($userId);
    $hash_id=hash('sha256',$userId);
    $addFormStmt->bind_param("ss",$title, $hash_id);
    $addFormStmt->execute();
    $id=$GLOBALS['conn']->insert_id;
    $addFormStmt->close();
    return $id;
    }
    die("Error vo addForm(...)");
}

function getFormData($userId, $tableId)
{
    $getFormDataStmt="SELECT * FROM form_table_{$userId}_{$tableId}";
    $rez=$GLOBALS['conn']->query($getFormDataStmt);
    return $rez;
}

function getFormHashById($userId,$formId)
{
    $sql="SELECT * FROM form_table_{$userId} WHERE id = {$formId}";
    $row=mysqli_fetch_assoc($GLOBALS['conn']->query($sql));
    return isset($row)?$row['hash-id']:false;
}

function createFormTable($userId, $formId, $elementArray)
{
 $sql="CREATE TABLE form_table_{$userId}_{$formId} (";
 foreach ($elementArray as $key => $value) {
     switch ($value[0]) {
         case TEXT_FIELD:
             $sql.="element{$userId}_{$formId}_{$key} VARCHAR(150),";
             break;
         case TEXT_AREA:
             $sql.="element{$userId}_{$formId}_{$key} VARCHAR(450),";
             break;
         
     }
 }
}