<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="LogInCSS.css">
    <script src="SignUpScript.js"></script>
  </head>
  <body>
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
