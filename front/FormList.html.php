<?php
    session_start();
    require_once "../script/db.php";
    if (!isset($_SESSION['user_info'])) {
        header("Location: ./login_and_signup.html.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="FormList.css">
    <link rel="stylesheet" href="mediaqueries_footer.css">
    <script src="Prikazi.js"> </script>
    <script src="Out.js"> </script>
    <script src="nikola_skripti.js"></script>

    <link rel="shortcut icon" href="form.ico">
</head>
<body>
<div class="container">

    <div class="header">

        <div class="user-info">

            <span id="user_menu"> <?php echo $_SESSION['user_info']['name']?> </span>
            <div id="button_div" onmouseover="Prikazi()" onmouseout="Out()"> <button type="button" name="new" id="create_new" onmouseover="Prikazi()" onmouseout="Out()">Create new +</button> </div>

            <div class="settings-menu">
                <div onclick="window.location.replace('../profile-options/profileoptions.html.php')" class="settings-menu-item">Profile options</div>
                <div onclick="logOut()" class="settings-menu-item">Log out</div>
            </div>
        </div>

    </div>

    <div class="content">

        <div class="form-list">
            <?php

            $sqlRez=getUsersForms($_SESSION['user_info']['id']);
            if(mysqli_num_rows($sqlRez)>0){
                while ($row=mysqli_fetch_assoc($sqlRez)){
                    echo "
                    <div class=\"single-form\" onclick=\"goToForm('".$row['hash-id']."')\">".$row['form-title']."</div>
                    ";
                }
            }else{
                echo '<div class="single-form" ><strong>There is no forms yet</strong></div>';
            }
            ?>
        </div>

    </div>
    <?php var_dump($_SESSION); var_dump($_COOKIE)?>
</div>

<div class="footer">
    <footer id="footer_eden">WebForms &copy; 2018</footer>
    <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
</div>

</body>
</html>
