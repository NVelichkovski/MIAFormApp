<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="FormList.css">
    <script src="Prikazi.js"> </script>
    <script src="Out.js"> </script>

     <link rel="shortcut icon" href="form.ico">
</head>
<body>
<div class="container">

    <div class="header">

        <div class="user-info">

            <span id="user_menu"> <?php echo $_SESSION['user_info']['name']?> </span>
            <div id="button_div" onmouseover="Prikazi()" onmouseout="Out()"> <button type="button" name="new" id="create_new" onmouseover="Prikazi()" onmouseout="Out()">Create new +</button> </div>

            <div class="settings-menu">
                <div class="settings-menu-item">Profile options</div>
               <a href="../script/log-out.php" style="color: inherit; text-decoration: none"> <div class="settings-menu-item">Log out</div> </a>
            </div>
        </div>

    </div>

    <div class="content">

        <div class="form-list">

            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>
            <div class="single-form">List 1</div>


        </div>

    </div>

</div>
