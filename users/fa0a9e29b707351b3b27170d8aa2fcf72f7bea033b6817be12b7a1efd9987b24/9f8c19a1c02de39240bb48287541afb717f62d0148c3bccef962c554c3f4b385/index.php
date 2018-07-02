
    <?php 
        session_start();
        $_SESSION['form']='6';
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
        var formArray=JSON.parse('{"title":"\u0418\u0437\u0431\u043e\u0440 \u0437\u0430 \u0442\u0435\u0440\u043c\u0438\u043d","elements":[[4,"\u041a\u043e\u043b\u043a\u0443 \u0447\u043b\u0435\u043d\u043e\u0432\u0438","1","2"],[4,"\u0414\u0435\u043d"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Избор за термин</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_6_0">Колку членови</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_6_0_2_4" value="1" id="element_1_6_0_2_4">
                    <label for="element_1_6_0_2_4">1</label>
                </li>
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_6_0_3_4" value="2" id="element_1_6_0_3_4">
                    <label for="element_1_6_0_3_4">2</label>
                </li></ul></div><div class="form-element">
                    <legend for="element_1_6_1">Ден</legend>
                    <ul class="radio_combo"></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 