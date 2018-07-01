<?php
    session_start();
    require_once "../db.php";

    $pass=$_POST['password'];
    updatePassword($_SESSION['user_info']['id'], $pass);
