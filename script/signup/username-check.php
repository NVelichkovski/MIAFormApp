<?php
require_once '../db.php';
$username=$_POST['username'];
echo isUsernameUnique($username);