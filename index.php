<?php
    session_start();
    require_once "script/variables.php";
    require_once "script/db.php";
    if (isset($_SESSION['user_info'])&& isset($_SESSION['user_info']['id']))
    {
        header("Location: ./front/formlist.html.php");
        exit();
    }
//    $_SESSION['state']=LOG_IN;
    if (isset($_COOKIE['remember_me']))
    {
        $row=getRowByRememberMeToken($_COOKIE['remember_me']);
        if ($row)
        {
            $_SESSION['user_info']=$row;
            $token=uniqid($row['id']);
            setcookie("remember_me", $token, time() +2592000, "/");
            updateRememberMeToken($_SESSION['user_info']['id'],  $token);
            header("Location: ./front/formlist.html.php");
        }
    }
    header("Location: ./front/login_and_signup.html.php");