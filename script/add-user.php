<?php
session_start();
require_once "connect.php";



$email=$_POST['email'];
$username=$_POST['username'];
$name=$_POST['name'];
$password= password_hash($_POST['password'], PASSWORD_BCRYPT);


$sql="SELECT * FROM users WHERE email='".$email."'";
if (mysqli_num_rows($conn->query($sql)) != 0) {
    $_SESSION['state']="EMAIL_ALREADY_EXIST";
    header('Location: ../form2/signup.html.php');
    exit();
}

$sql="SELECT * FROM users WHERE username='".$username."'";
if (mysqli_num_rows($conn->query($sql)) != 0) {
    $_SESSION['state']="USERNAME_ALREADY_EXIST";
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    header('Location: ../form2/signup.html.php');
    exit();
}
else{
        unset($_SESSION['state']);
    
    $sql="INSERT INTO users (email, username, name, password) VALUES ('".$email."', '".$username."', '".$name."', '".$password."')";
    if ($conn->query($sql)===TRUE) {

        $sql="SELECT * FROM users WHERE email='$email'";
        $rez=$conn->query($sql);
        $row=mysqli_fetch_assoc($rez);
        
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        
        
        $sql="CREATE TABLE {$username}_table_of_forms (id VARCHAR(25))";
            if ($conn->query($sql)===TRUE) {
                mysqli_close($conn);
                header("Location: HTML_PROBA/user-page.html.php");
                die();
            }else
            { 
                echo mysqli_error($conn);
                die();
            }
        }
        else
        { 
            echo mysqli_error($conn);
            die();
    }
    mysqli_close($conn);
   
}
mysqli_close($conn);