<?php
    require_once "db.php";
    if (!isset($_GET['u'])|| !isset($_GET['f'])) {
        header("Location: http://localhost:63342/MIAFormApp/404Error.html");
        exit();
    }
    $userRow=getUserRowByHashId($_GET['u']);
    if (!$userRow){
        header("Location: http://localhost:63342/MIAFormApp/404Error.html");
        exit();

    }
    $formRow=getFormRowByHashId($userRow['id'],$_GET['f']);

if ($formRow)
    {
        header("Location: http://localhost:63342/MIAFormApp/users)/".$_GET['u']."/".$_GET['f']);
        exit();

    }

     header("Location: http://localhost:63342/MIAFormApp/404Error.html");
    exit();
