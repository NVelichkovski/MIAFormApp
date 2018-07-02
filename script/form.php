<?php
require_once "db.php";
if (isset($_GET['user'])&& isset($_GET['form'])){
    $user=getUserRowByHashId($_GET['user']);
    $form=getFormRowByHashId($user['id'],$_GET['form']);
    if ($user && $form){
    header("Location: http://localhost:63342/MIAFormApp/users/{$_GET['user']}/{$_GET['form']}");
    exit();
    }
}
    header("Location: http://localhost:63342/MIAFormApp/front/404Error.html ");