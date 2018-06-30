<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebForms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <span class="error-message">The form dose not exist<br> or is no longer valid</span>

    <span class="error-code">404</span>
    <?php
    var_dump($_SESSION);
    ?>
</body>
</html>