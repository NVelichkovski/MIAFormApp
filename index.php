<?php
    // require_once "script/connect.php";

    // print_r($_COOKIE);
    if (isset($_COOKIE['remember_me'])) {
        $sql="SELECT * FROM users WHERE token='".$_COOKIE['remember_me']."'";
        $row=mysql_fetch_assoc($conn->query($sql));
        // echo "<br>The row:".print_r($row);
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
       header("Location: script/html_proba/user-page.html.php");
    }
    else header("Location: form2/login.html.php");