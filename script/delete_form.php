<?php
session_start();
require_once "db.php";
$userId=$_POST['user-id'];
$formId=$_POST['form-id'];

deleteFormFromUserList($userId,$formId);
$form=getFormRowByHashId($userId, $formId);
$target="../users/{$_SESSION['hash_id']}/{$form['hash-id']}";
if(is_dir($target)){
    $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

    foreach( $files as $file ){
        delete_files( $file );
    }

    rmdir( $target );
} elseif(is_file($target)) {
    unlink( $target );
}