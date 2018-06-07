<?php
    require_once "connect.php";
    session_start();

    //varchar(25) za sekoj token
    function setRememberMeCookie()
    {
        $token=uniqid($_SESSION['id']);
        $sql="UPDATE users SET token=$token WHERE id='".$_SESSION['id']."'";
        if ($conn->query($sql)===TRUE) {
            # code...
        }    
    }

    $email_username=$_POST['username_email'];
    $password= password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql="SELECT * FROM users WHERE username='".$email_username."' OR email='".$email_username."'";
    $rez=$conn->query($sql);
    $row = $rez->fetch_assoc();  

    if (mysqli_num_rows($rez)==0) {
        $_SESSION['state']="EMAIL_OR_USERNAME_NOT_FOUND";
        header("Location: log-in.html.php");
        exit();
    }
    if (password_verify($password,$row['password'])) {
        $_SESSION['state']="INVALID_PASSWORD";
        header("Location: log-in.html.php");
        exit();
    }
    else{
    if (isset($_SESSION['state'])) {
        unset($_SESSION['state']);
    }
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['name']=$row['name'];
    $_SESSION['surname']=$row['surname'];
    $_SESSION['email']=$row['email'];

    
    header("Location: user-page.html.php");
    exit();
    }