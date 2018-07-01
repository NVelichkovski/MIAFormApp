<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebForms</title>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.css"></link>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="form.ico">
    <link rel="stylesheet" href="FormList.css">
    <link rel="stylesheet" href="ProfileOptions.css">
    <link rel="stylesheet" href="ForgotPasswordCSS.css">
    <link rel="stylesheet" href="MediaQueries_ForgotPass.css">
    <link rel="stylesheet" href="MediaQueries_ProfileOptions.css">
    <script src="./ProfileOptionsNew.js"></script>
    <script src="nikola_skripti.js"></script>

</head>
<body>
<div class="container">

    <div class="header">

        <div class="user-info">

            <span><?php echo $_SESSION['user_info']['name']?></span>

            <div class="settings-menu">
                <a class="settings-menu-item" href="ProfileOptions.html.php">Profile options</a>
                <div class="settings-menu-item" onclick="logOut()">Log out</div>
            </div>
        </div>

    </div>


    <div class="content">

        <div  id="view-0" class="user-informations">

            <form>

                <h4 class="title">
                    Your personal settings
                </h4>

                <div class="form-item">
                    <label>Name</label>
                    <div id="name"><?php echo $_SESSION['user_info']['name']; ?></div>
                </div>


                <div class="form-item">
                    <label>Username</label>
                    <div id="username"><?php echo $_SESSION['user_info']['username'] ?></div>
                </div>


                <div class="form-item">
                    <label>Email</label>
                    <div id="email"><?php echo $_SESSION['user_info']['email']; ?></div>
                </div>

                <div class="form-button" style="padding-bottom: 30px;">
                    <button
                            type="button" id="edit_button">Edit settings</button>
                </div>



            </form>

        </div>

        <br>

        <div id="view-1" class="edit-user-informations">

            <form id="edit-form">

                <h4 class="title">
                    Edit your personal settings
                </h4>

                <div class="form-item">
                    <label>Name</label>
                    <input type="text" id="name_input"/>
                </div>

                <div class="form-item">
                    <label>Username</label>
                    <input type="text" id="username_input" />
                </div>

                <div class="form-item">
                    <label>Email</label>
                    <input type="email" id="email_input" />
                </div>

                <div class="form-item" id="chanege_pass_div">
                    <label id="labela">
                        <span
                           id="changePassword">Change password</span>
                    </label>
                </div>

                <div class="form-button">
                    <button id="back_button" type="button">Back</button>
                    <button id="save_button" type="button">Save settings</button>
                </div>


            </form>

        </div>
        <div class="reset">
          <span class="poraka">Please enter your current password:</span>
          <br>
          <input id="current_pass" type="password" name="" value="">
          <br>
          <input id="continue" type="button" name="" value="Continue">
          <input id="cancel" type="button" name="" value="Cancel">
        </div>

        <div class="reset_next">
          <span class="poraka_2">Please enter your new password, then re-enter it:</span>
          <br>
          <input id="new_pass" type="password" name="" value="">
          <img src="em1.png" alt="" id="slika1">
          <div class="tt_div">
            <div class="strelka_1"> </div>
            <div class="tooltip_1">Your password length should be at least 6 characters</div>
          </div>
          <br>
          <input id="renew_pass" type="password" name="" value="">
          <img src="em1.png" alt="" id="slika2">
          <div class="tt_div">
            <div class="strelka"> </div>
            <div class="tooltip" id="pass_tooltip">Password doesn't match</div>
          </div>
          <br>
          <input id="reset_button" type="button" name="" value="Reset">
          <input id="cancel_2" type="button" name="" value="Cancel">
        </div>

        <script type="text/javascript" src="CheckBeforeReset.js"></script>

        <br>
        <div class="footer">
          <footer id="footer_eden">WebForms &copy; 2018</footer>
          <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
        </div>
    </div>
</div>
</body>
</html>
