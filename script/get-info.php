<?php
    session_start();
    require_once "db.php";

    $formHash=$_POST['form'];
    $formId=getFormRowByHashId($_SESSION['user_info']['id'],$formHash)['id'];
    $qryRez=getFormTableContent($_SESSION['user_info']['id'], $formId);

    $formArray=[];
    while ($row=mysqli_fetch_assoc($qryRez)){
        array_push($formArray,$row);
    }
// DELETE
    echo json_encode($formArray);