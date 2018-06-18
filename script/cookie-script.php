<?php
require_once "db.php";
session_start();

if (isset($_SESSION['remember_me'])&&$_SESSION['remember_me'])
{
    $token=uniqid($_SESSION['user_info']['id']);
    setcookie("remember_me", $token, time() +2592000, "/");
    updateRememberMeToken($_SESSION['remember_me']['id'],  $_SESSION['remember_me']['token']);
    unset($_SESSION['remember_me']);
}
var_dump($_SESSION);
header("Location: ../front/formlist.html.php");