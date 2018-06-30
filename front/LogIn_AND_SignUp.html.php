<?php
session_start();

if (isset($_SESSION['user_info'])&& isset($_SESSION['user_info']['id']))
{
    header("Location: ../front/formlist.html.php");
    exit();
}

function errorToast($_message, $_title)
{
        echo 'document.onload=toastr["error"]("'.$_message.'", "'.$_title.'");
        </script>
        ';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Form app</title>
    <!-- JQuery scripts -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">
    
    <!--Log In skripti i css-->
    <link rel="stylesheet" href="LogInCSS.css">
    <script src="SignUpScript.js"></script>
    <script src="LogInScript.js"></script>
    <script src="HideTooltip.js"></script>

    <!--Sign up skripti i css-->
    <link rel="stylesheet" href="SignUpCSS.css">
    <script src="Check.js"></script>
    <script src="HideTT.js"></script>
    <script src="BackLogIn.js"></script>

    <link rel="stylesheet" href="MediaQueries.css">

    <!-- Footer css -->
   <link rel="stylesheet" href="mediaqueries_footer.css">
    
    
    <link rel="shortcut icon" href="form.ico">
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
    </script>
    <style>
    </style>
</head>
<body>
<!--LOGIN DEL-->
<div id="part_one">
</div>

<div id="part_two">
    <div id="forma">
        <form id="log_in" method="post"  autocomplete="off">
        <!-- <form id="log_in" onsubmit="return LogInCheck()"> -->
        <br>
            <span id="user_label">Username</span>
            <input id="username_field" type="text" name="username_email" value="" onclick="HideTooltip1()">
            <br>
            <img id="img1" src="em.png" alt="">
            <div class="tt_div">
                <div class="strelka"> </div>
                <div class="tooltip" id="user_tooltip">Please enter your username</div>
            </div>
            <br>
            <br>
            <span id="pass_label">Password</span>
            <input id="pass_field" type="password" name="password" value="" onclick="HideTooltip2()">
            <br>
            <img id="img2" src="em.png" alt="">
            <div class="tt_div">
                <div class="strelka"> </div>
                <div class="tooltip" id="pass_tooltip">Please enter your password</div>
            </div>
            <br>
            <br>
            <br>
           <button id="login_button" type="button" name="login" onclick="LogInCheck()" >Login</button>
            <br>
            <br>
            <button id="signup_button" type="button" name="signup" onclick="SignUpFunction()">Sign up</button>
            <br>
            <br>
            <input id="check" type="checkbox" name="remember_me" value="1"> <span id="logged_in">Keep me logged in</span>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>

<!--SIGNUP DEL-->

<div id="part_three">
    <div id="part_one_2">
    </div>

    <div id="part_two_2">
        <button id="back_login" type="button" name="backToLogIn" onclick="BackLogIn()">LogIn</button>
        <div id="forma_2">
            <form id="sign_up_2" action="../script/add-user.php" method="post" onsubmit="return Check()" autocomplete="off">
                <span id="fullname_label_2">Full Name</span>
                <input id="fullname_field_2" type="text" name="name" value="" onclick="HideTT1()">
                <img class="img_2" src="em.png" alt="">
                <div class="tt_div_2">
                    <div class="strelka1 strelka_2"> </div>
                    <div class="tooltip_2" id="name_tooltip_2">Please enter your fullname</div>
                </div>
                <span id="email_label_2">Email</span>
                <input id="email_field_2" type="email" name="email" value="" onclick="HideTT2()" onchange="checkIsEmailUnique()">
                <img class="img_2" src="em.png" alt="">
                <div class="tt_div_2">
                    <div class="strelka2 strelka_2"> </div>
                    <div class="tooltip_2" id="email_tooltip_2">Please enter your e-mail</div>
                </div>
                <span id="user_label_2">Username</span>
                <input id="username_field_2" type="text" name="username" value="" onclick="HideTT3()" onchange="chckIsUsernameUnique()">
                <img class="img_2" src="em.png" alt="">
                <div class="tt_div_2">
                    <div class="strelka3 strelka_2"> </div>
                    <div class="tooltip_2" id="user_tooltip_2">Please enter your username</div>
                </div>
                <span id="pass_label_2">Password</span>
                <input id="pass_field_2" type="password" name="password" value="" onclick="HideTT4()">
                <img class="img_2" src="em.png" alt="">
                <div class="tt_div_2">
                    <div class="strelka4 strelka_2"> </div>
                    <div class="tooltip_2" id="pass_tooltip_2">Please enter your password</div>
                </div>
                <span id="confirm_label_2">Confirm Password</span>
                <input id="confirm_field_2" type="password" name="confirm_password" value="" onclick="HideTT5()">
                <img class="img_2" src="em.png" alt="">
                <div class="tt_div_2">
                    <div class="strelka5 strelka_2"> </div>
                    <div class="tooltip_2" id="repass_tooltip_2">Please re-enter your password</div>
                </div>
            <button id="create_button" type="submit" name="create_account" >Create Account</button></a>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <footer id="footer_eden">WebForms &copy; 2018</footer>
    <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
</div>
<div class="footer">
    <footer id="footer_eden">WebForms &copy; 2018</footer>
    <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
</div>
</body>

<?php
if (isset($_SESSION['state']))
    if ($_SESSION['state']==2)
        echo "<script>SignUpFunction()</script>;";

if(isset($_SESSION['errors']))
{
    if (in_array(1,$_SESSION['errors']))
        errorToast("Incorect password, please try again","Loging problem");
    if (in_array(2,$_SESSION['errors']))
        errorToast("There is no account with this username or e-mail address please try again","Loging problem");
    if (in_array(3,$_SESSION['errors']))
        errorToast("There is already account with this e-mail, please try again","Loging problem");
    if (in_array(4,$_SESSION['errors']))
        errorToast("There is already account with this username please try again","Loging problem");
    var_dump($_SESSION);
}
?>

</html>
