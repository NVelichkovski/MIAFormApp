<?php
    session_start();
    require_once "connect.php";
    

    //Zoshto ne mi e deklarirano $conn dokolku go povikuvam do funkcija
    //varchar(25) za sekoj token
    // function setRememberMeCookie()
    // {
    //     require_once "connect.php";
    //     $token=uniqid($_SESSION['id']);
    //     $sql="UPDATE users SET token='$token' WHERE id='".$_SESSION['id']."'";
    //     $conn->query($sql);  
    //     echo "Error:".mysqli_error($conn);      
    //     setcookie("remember_me",$token,time()+30*24*60*60*1000);
    // }
    // echo "<script>alert('cookie: ".isset($_COOKIE['remember_me'])?$_COOKIE['remember_me']:""."')</script>";
    
    $email_username=$_POST['username_email'];
    // $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username='".$email_username."' OR email='".$email_username."'";
    $rez=$conn->query($sql);
    $row = $rez->fetch_assoc();  

    if (mysqli_num_rows($rez)==0) {
        $_SESSION['state']="EMAIL_OR_USERNAME_NOT_FOUND";
        header("Location: HTML_PROBA/log-in.html.php");
        exit();
    }
    if (!password_verify($password,$row['password'])) {
        $_SESSION['state']="INVALID_PASSWORD";
        header("Location: HTML_PROBA/log-in.html.php");
        exit();
    }
    else{
        unset($_SESSION['state']);
    
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
       
        
        if (isset($_POST['remember_me'])) {
            $token=uniqid($_SESSION['id']);
            $sql="UPDATE users SET token='$token' WHERE id='".$_SESSION['id']."'";
            $conn->query($sql);   
            setcookie("remember_me", $token, time()+30*24*60*60*1000);
        }
        else{
            setcookie("remember_me","",time()-1000);
        }

        // echo "in login-user.php script";
    header("Location: HTML_PROBA/user-page.html.php");
    exit();
    }   