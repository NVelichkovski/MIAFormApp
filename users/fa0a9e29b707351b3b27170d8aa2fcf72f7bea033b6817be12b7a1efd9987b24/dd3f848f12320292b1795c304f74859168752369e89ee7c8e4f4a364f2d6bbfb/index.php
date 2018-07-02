
    <?php 
        session_start();
        $_SESSION['form']='5';
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
        var formArray=JSON.parse('{"title":"MIA prezentacija","elements":[[1,"Grupa"],[3,"Datum","02.07.2018","10.08.2018"],[2,"Opis na tema"],[4,"Isprateno na mail","da","ne"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">MIA prezentacija</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_5_0_1">Grupa</legend>
                    <input class="text-field" type="text" name="element_1_5_0_1" id="element_1_5_0" />
                </div><div class="form-element">
                    <legend for="element_1_5_1">Datum</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_1_5_1_3" value="02.07.2018" id="element_1_5_1_2">
                    <label for="element_1_5_1_3">10.08.2018</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_1_5_1_3" value="10.08.2018" id="element_1_5_1_3">
                    <label for="element_1_5_1_3"></label>
                </li></ul></div><div class="form-element">
                    <legend for="element_1_5_2_2">Opis na tema</legend>
                    <textarea name="element_1_5_2_2" id="element_1_5_2_2" cols="30" rows="10"></textarea>
                </div><div class="form-element">
                    <legend for="element_1_5_3">Isprateno na mail</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_5_3_2_4" value="da" id="element_1_5_3_2_4">
                    <label for="element_1_5_3_2_4">ne</label>
                </li>
                <li>
                    <input class="checkbox" type="checkbox" name="element_1_5_3_3_4" value="ne" id="element_1_5_3_3_4">
                    <label for="element_1_5_3_3_4"></label>
                </li></ul></div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 