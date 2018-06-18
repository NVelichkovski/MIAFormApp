<?php
session_start();
require "db.php";
require_once "variables.php";

$_SESSION['state']=LOG_IN;

    unset($_SESSION['errors']);



$username_email=strtoupper($_POST['username_email']);
$password=$_POST['password'];
$_SESSION['remember_me']=isset($_POST['remember_me']);

function setRememberMeCookie($id)
{
    $token = uniqid($id);
    updateRememberMeToken($id, $token);
    setcookie("remember_me", $token, time()+1000*60*60*24*15);
}

if (getRowByEmail($username_email)) {
        if (emailAndPasswordMatch($username_email,$password)) {
            $_SESSION['user_info']=getRowByEmail($username_email);
            closeConnection();
            header("Location: cookie-script.php");
            exit();
        }
        else{
            if (!isset($_SESSION['errors']))
                $_SESSION['errors']= array();
            array_push($_SESSION['errors'],INCORECT_PASSWORD);
        }
}
else if (getRowByUsername($username_email)) {
        if (usernameAndPasswordMatch($username_email,$password)) {
            $_SESSION['user_info']=getRowByUsername($username_email);
            closeConnection();
            header("Location: cookie-script.php");
            exit();
        }else
        {
            if (!isset($_SESSION['errors']))
                $_SESSION['errors']= array();
            array_push($_SESSION['errors'],INCORECT_PASSWORD);
        }
} else{
    if (!isset($_SESSION['errors']))
        $_SESSION['errors']= array();
    array_push($_SESSION['errors'],USERNAME_EMAIL_NOT_FOUND);
}

closeConnection();
header("Location: ../front/LogIn_AND_SignUp.html.php");
exit();