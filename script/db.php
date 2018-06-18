<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$conn=new mysqli("localhost","root", "", "formappdatabase");
if ($conn->connect_error) {
    die("Connection field: ".$conn->connect_error);
}

function closeConnection(){
    mysqli_close($GLOBALS['conn']);
}

function addUser(string $email, string $username, string $name, string $password)
{   $addUserStmt=$GLOBALS['conn']->prepare("INSERT INTO users (email, username, name, password) VALUES (?, ?, ?, ?)");
    $addUserStmt->bind_param("ssss", $email, $username, $name, $password);
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
function createFormTable($username)
{
    $id=getRowByUsername($username)['id'];
    $sql="CREATE TABLE form_table_{$id} (formName VARCHAR(20) )";
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
function updatePasswordHash($id, $hash){
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