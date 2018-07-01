<?php
    session_start();
    require_once "../db.php";

    $password=$_POST['password'];
    $username=$_SESSION['user_info']['username'];
    echo usernameAndPasswordMatch($username, $password)?"true":"false";