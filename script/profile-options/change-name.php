<?php
    session_start();
    require_once '../db.php';
    $name=$_POST['name'];
    updateName($_SESSION['user_info']['id'], $name);
    $_SESSION['user_info']=getRowById($_SESSION['user_info']['id']);
    echo true;
