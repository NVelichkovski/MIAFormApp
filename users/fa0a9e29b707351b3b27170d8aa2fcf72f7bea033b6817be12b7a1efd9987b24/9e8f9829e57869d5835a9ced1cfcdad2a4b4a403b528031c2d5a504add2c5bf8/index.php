
    <?php 
        session_start();
        $_SESSION['form']='4';
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
        var formArray=JSON.parse('{"title":"Izbor za prezentiranje MIA","elements":[[1,"Grupa"],[3,"Datum","02.07.2018","10.08.2018"],[2,"Opis na proekt"],[4,"Prateno na mail","da","ne"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Izbor za prezentiranje MIA</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_4_0_1">Grupa</legend>
                    <input class="text-field" type="text" name="element_1_4_0_1" id="element_1_4_0" />
                </div><div class="form-element">
                    <legend for="element_1_4_1">Datum</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_1_4_1_3" value="02.07.2018" id="element_1_4_1_2">
                    <label for="element_1_4_1_3">Datum</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_4_1_3" value="10.08.2018" id="element_1_4_1_3">
                    <label for="element_1_4_1_3">Datum</label>
                </li></ul></div><div class="form-element">
                    <legend for="element_1_4_2_2">Opis na proekt</legend>
                    <textarea name="element_1_4_2_2" id="element_1_4_2_2" cols="30" rows="10"></textarea>
                </div><div class="form-element">
                    <legend for="element_1_4_3">Prateno na mail</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_4_3_2_4" value="da" id="element_1_4_3_2_4">
                    <label for="element_1_4_3_2_4">Prateno na mail</label>
                </li>
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_4_3_3_4" value="ne" id="element_1_4_3_3_4">
                    <label for="element_1_4_3_3_4">Prateno na mail</label>
                </li></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 