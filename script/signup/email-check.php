<?php
    require_once '../db.php';
    $email=$_POST['email'];
    echo isEmailUniqe($email);