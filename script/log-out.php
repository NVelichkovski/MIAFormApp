<?php
require_once  "db.php";

error_reporting(0);
session_start();

removeRememberMeToken($_SESSION['user_info']['id']);
setcookie("remember_me","", time()-1000);
setcookie("remember_me","", time()-1000, '/');
session_destroy();
echo "Cookies are destroyed. \$_COOKIE['remember_me']="+$_COOKIE['remember_me'];