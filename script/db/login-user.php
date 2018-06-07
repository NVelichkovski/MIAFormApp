<?php
    require_once "connect.php";
    session_start();

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
    // echo "<script>console.log(\"id is set id=".$row['id']."\" session_id is set \$_SESSION['id']=".$_SESSION['id'].") </script>";
    header("Location: user-page.html.php");
    exit();
    }