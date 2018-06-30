<?php
    require_once "db.php";
    if (!isset($_GET['u'])|| !isset($_GET['f'])) {
        header("Location: http://localhost/miaformapp/front/404");
        exit();
    }
    $userRow=getUserRowByHashId($_GET['u']);
    if (!$userRow){
        header("Location: http://localhost/miaformapp/front/404");
        exit();
    }
    $formRow=getFormRowByHashId($userRow['id'],$_GET['f']);

if ($formRow)
    {
        header("Location: http://localhost/miaformapp/users/".$_GET['u']."/".$_GET['f']);
        exit();
    }

    header("Location: http://localhost/miaformapp/front/404");
    exit();
