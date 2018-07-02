
    <?php 
        session_start();
        $_SESSION['form']='2';
        $_SESSION['user']='1';
        
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
        var formArray=JSON.parse('{"title":"\u0418\u0437\u0431\u043e\u0440 \u0437\u0430 \u0434\u0430\u0442\u0443\u043c","elements":[[3,"Label caption","12.02.2018","11.02.2018","10.02.2018"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Избор за датум</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_2_0">Label caption</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_1_2_0_3" value="12.02.2018" id="element_1_2_0_2">
                    <label for="element_1_2_0_3">Label caption</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_2_0_3" value="11.02.2018" id="element_1_2_0_3">
                    <label for="element_1_2_0_3">Label caption</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_2_0_3" value="10.02.2018" id="element_1_2_0_4">
                    <label for="element_1_2_0_3">Label caption</label>
                </li></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 