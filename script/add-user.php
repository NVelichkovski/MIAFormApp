<?php
session_start();
require "db.php";
require_once "variables.php";

$_SESSION['state']=SIGN_UP;

$name=$_POST['name'];
$email=strtoupper($_POST['email']);
$username=strtoupper($_POST['username']);
$password=password_hash($_POST['password'], PASSWORD_BCRYPT);

$isValidSignUp=true;

if (!isEmailUniqe($email)) {
    $isValidSignUp=false;
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors']= array();
    }
    array_push($_SESSION['errors'],EMAIL_EXIST);
}

if (!isUsernameUnique($username)) {
    echo "Username prob";
    $isValidSignUp=false;
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors']= array();
    }
    array_push($_SESSION['errors'],USERNAME_EXIST);
}

if ($isValidSignUp) {
    addUser($email,$username,$name,$password);
    $_SESSION['user_info']= getRowByUsername($username);
    createFormsTable($username);
    closeConnection();
    var_dump($_POST);
    var_dump($_SESSION);
    header("Location: ../front/formlist.html.php");
    exit();
} else {
    closeConnection();
    header("Location: ../front/login_and_signup.html.php");
    exit();
}
