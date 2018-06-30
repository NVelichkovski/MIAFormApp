<?php
session_start();
require_once '../db.php';
$username=$_POST['username'];

updateUsername($_SESSION['user_info']['id'], $username);
$_SESSION['user_info']=getRowById($_SESSION['user_info']['id']);
echo true;
