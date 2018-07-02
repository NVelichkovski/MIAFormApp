<?php
    session_start();
    require_once "db.php";

    $formId=$_SESSION['form'];
    $userId=$_SESSION['user'];

    $stmt="INSERT INTO `form_table_{$userId}_{$formId}` (";

    foreach($_POST as $key => $value){
        $stmt=$stmt."`$key`, ";
    }
    $stmt=substr($stmt, 0, -2);
    $stmt=$stmt.") VALUES (";
    foreach($_POST as $key => $value){
        $value=mysqli_real_escape_string($conn, $value);
        $stmt=$stmt." '$value', ";
    }
    $stmt=substr($stmt, 0, -2);
    $stmt=$stmt.');';

    if (!mysqli_query($conn,$stmt))
        echo mysqli_error($conn);
    else header("Location: http://localhost:63342/MIAFormApp/front/submit.html");

