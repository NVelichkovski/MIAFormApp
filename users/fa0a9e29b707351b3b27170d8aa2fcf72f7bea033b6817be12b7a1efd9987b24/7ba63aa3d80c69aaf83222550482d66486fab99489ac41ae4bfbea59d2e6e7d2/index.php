
    <?php 
        session_start();
        $_SESSION['form']='7';
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
        var formArray=JSON.parse('{"title":"\u0412\u0440\u0435\u043c\u0435","elements":[[3,"\u041a\u043e\u0435 \u0432\u0440\u0435\u043c\u0435","12 am","12 pm"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Време</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_7_0">Кое време</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_1_7_0_3" value="12_am" id="element_1_7_0_2">
                    <label for="element_1_7_0_3">12 am</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_7_0_3" value="12_pm" id="element_1_7_0_3">
                    <label for="element_1_7_0_3">12 pm</label>
                </li></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 