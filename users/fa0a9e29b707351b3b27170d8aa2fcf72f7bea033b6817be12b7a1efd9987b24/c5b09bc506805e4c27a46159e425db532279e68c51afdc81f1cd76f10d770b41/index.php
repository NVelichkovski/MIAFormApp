
    <?php 
        session_start();
        $_SESSION['form']='1';
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
        var formArray=JSON.parse('{"title":"Naslov","elements":[[3,"sasdf","nekakov","nekakov","nekakov"],[3,"Proben tajtl"],[6,"Datum"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Naslov</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_1_0">sasdf</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_1_1_0_3" value="nekakov" id="element_1_1_0_2">
                    <label for="element_1_1_0_3">sasdf</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_1_0_3" value="nekakov" id="element_1_1_0_3">
                    <label for="element_1_1_0_3">sasdf</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_1_0_3" value="nekakov" id="element_1_1_0_4">
                    <label for="element_1_1_0_3">sasdf</label>
                </li></ul></div><div class="form-element">
                    <legend for="element_1_1_1">Proben tajtl</legend>
                    <ul class="radio_combo"></ul></div><div class="form-element">
                    <legend for="element_1_1_2_6">Datum</legend>
                    <input class="date-field" type="date" name="element_1_1_2_6" id="element_1_1_2" />
                </div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 