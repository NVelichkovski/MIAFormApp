<?php
require_once  "db.php";
session_start();
removeRememberMeToken($_SESSION['user_info']['id']);
session_destroy();
setcookie("remember_me","");
header("Location: ../front/login_and_signup.html.php");