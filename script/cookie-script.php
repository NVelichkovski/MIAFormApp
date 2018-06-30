<?php
    require_once "db.php";
    session_start();

    $token=uniqid($_SESSION['user_info']['id']);
    setcookie("remember_me", $token, time() +2592000, "/");
    updateRememberMeToken($_SESSION['user_info']['id'],  $token);
