<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="import" href="all-scripts.html">
  <link rel="stylesheet" href="signupcss.css">
  </head>
  <body>
    <?php
    if (isset($_SESSION['state'])) {
      
      if ($_SESSION['state']=="EMAIL_ALREADY_EXIST") {
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
      document.onload=toastr["error"]("There is already account with this email", "Error Signing up");
       </script>
       ';
      }
      else{
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
        document.onload=toastr["error"]("There is already account with this username", "Error Signing up");
       </script>
       ';
      }
    }
    ?>

<div id="part_one">
    </div>

    <div id="part_two">
      <div id="forma">
        <form id="sign_up" action="../script/add-user.php" method="post">
          <br>
          <span id="fullname_label">Full Name</span>
          <br>
          <input id="fullname_field" type="text" name="fullname" value="">
          <br>
          <br>
          <span id="email_label">Email</span>
          <br>
          <input id="email_field" type="email" name="email" value="">
          <br>
          <br>
          <span id="user_label">Username</span>
          <br>
          <input id="username_field" type="text" name="username" value="">
          <br>
          <br>
          <span id="pass_label">Password</span>
          <br>
          <input id="pass_field" type="password" name="password" value="">
          <br>
          <br>
          <span id="confirm_label">Confirm Password</span>
          <br>
          <input id="confirm_field" type="password" name="confirm_password" value="">
          <br>
          <br>
          <br>
          <a href="../script/add-user.php"><button id="create_button" type="button" name="create_account">Create Account</button></a>
          <br>
          <br>
        </form>
      </div>
    </div>
  </body>
</html>
