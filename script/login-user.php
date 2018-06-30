<?php
session_start();
require "db.php";
require_once "variables.php";

$_SESSION['state']=LOG_IN;

    unset($_SESSION['errors']);

$data=$_POST['data'];
$username_email=strtoupper($data['username_email']);
$password=$data['password'];
$remember_me=$data['remember_me'];

if (getRowByEmail($username_email)) {
        if (emailAndPasswordMatch($username_email,$password)) {
            $_SESSION['user_info']=getRowByEmail($username_email);
            if ($remember_me && isset($_SESSION['user_info']['id'])){
                $token=uniqid($_SESSION['user_info']['id']);
                setcookie("remember_me", $token, time() +2592000, "/");
                updateRememberMeToken((int)$_SESSION['user_info']['id'],(string)$token);
            }
            echo "false";
            closeConnection();
            exit();
        }
        else{
            closeConnection();
            echo "password";
            closeConnection();
            exit();
        }
}
else if (getRowByUsername($username_email)) {
        if (usernameAndPasswordMatch($username_email,$password)) {
            $_SESSION['user_info']=getRowByUsername($username_email);
            if ($remember_me){
                $token=uniqid($_SESSION['user_info']['id']&& isset($_SESSION['user_info']['id']));
                setcookie("remember_me", $token, time() +2592000, "/");
                updateRememberMeToken((int)$_SESSION['user_info']['id'], (string)$token);
            }
            echo "false";
            closeConnection();
            exit();
        }else{

            echo "password";
            closeConnection();
            exit();
        }
} else{
    closeConnection();
    echo "username_email";
    exit();
}
