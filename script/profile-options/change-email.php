<?php
session_start();
require_once '../db.php';
$email=$_POST['email'];
if (isEmailUniqe($email)){
updateEmail($_SESSION['user_info']['id'], $email);
$_SESSION['user_info']=getRowById($_SESSION['user_info']['id']);
echo true;
}
else echo false;