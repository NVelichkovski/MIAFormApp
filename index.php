<?php
    session_start();
    require_once "script/variables.php";
    require_once "script/db.php";
    if (isset($_SESSION['user_info'])&& isset($_SESSION['user_info']['id']))
    {
        header("Location: front/formlist.html.php");
        exit();
    }
    $_SESSION['state']=LOG_IN;

    if (isset($_COOKIE['remember_me']))
    {
        $row=getRowByRememberMeToken($_COOKIE['remember_me']);
        if ($row)
        {
            $_SESSION['user_info']=$row;
            $_SESSION['remember_me']=true;
            header("Location: script/cookie-script.php");
        }
    }
   header("Location: front/LogIn_AND_SignUp.html.php");
?>