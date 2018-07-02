
    <?php 
        session_start();
        $_SESSION['form']='1';
        $_SESSION['user']='2';
        
    ?>
        <!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebForms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../form/IndexCSS.css">
        
        <link rel="icon" href="../../form/form.ico">
        <script>
        var formArray=JSON.parse('{"title":"Marija","elements":[[6,"datum"],[3,"Gender","male","female"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Marija</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_2_1_0_6">datum</legend>
                    <input class="date-field" type="date" name="element_2_1_0_6" id="element_2_1_0" />
                </div><div class="form-element">
                    <legend for="element_2_1_1">Gender</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_2_1_1_3" value="male" id="element_2_1_1_2">
                    <label for="element_2_1_1_3">male</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_2_1_1_3" value="female" id="element_2_1_1_3">
                    <label for="element_2_1_1_3">female</label>
                </li></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 