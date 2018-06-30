<?php
    session_start();
    require_once "db.php";

    $returnArray=[];
    $sqlRez=getUsersForms($_SESSION['user_info']['id']);
    while ($row=mysqli_fetch_assoc($sqlRez)){
        array_push($returnArray,$row);
    }
    echo json_encode($returnArray);