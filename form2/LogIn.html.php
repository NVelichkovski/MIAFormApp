<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="import" href="all-scripts.html">  </head>
    <link rel="stylesheet" href="logincss.css">
  <body>
  <?php
    if (isset($_SESSION['state'])) {
      if ($_SESSION['state']=="EMAIL_OR_USERNAME_NOT_FOUND") {
      echo '<script>
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
       document.onload=toastr["error"]("There is no account with this username or e-mail", "Error Signing up");
       </script>
       ';
      }
      else if($_SESSION['state']=="INVALID_PASSWORD"){
        echo '
        <script>
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
       document.onload=toastr["error"]("Incorect password", "Error Signing up");
       </script>
       ';
      }
    }
    ?>
    <div id="part_one">
    </div>

    <div id="part_two">
      <div id="forma">
        <form id="log_in" action="../script/login-user.php" method="post">
          <br>
          <span id="user_label">Username or e-mail</span>
          <br>
          <input id="username_field" type="text" name="username_email" value="">
          <br>
          <br>
          <span id="pass_label">Password</span>
          <br>
          <input id="pass_field" type="password" name="password" value="">
          <br>
          <br>
          <input id="check" type="checkbox" name="remember_me" value=""> <span id="logged_in">Keep me logged in</span>
          <br>
          <span id="forgot_pass">Forgot your password?</span>
          <br>
          <br>
          <button id="login_button" type="submit" name="login">Login</button>
          <br>
          <br>
         <a href="SignUp.html.php"><button id="signup_button" type="button" name="signup">Sign up</button></a> 
        </form>
      </div>
    </div>
  </body>
</html>
