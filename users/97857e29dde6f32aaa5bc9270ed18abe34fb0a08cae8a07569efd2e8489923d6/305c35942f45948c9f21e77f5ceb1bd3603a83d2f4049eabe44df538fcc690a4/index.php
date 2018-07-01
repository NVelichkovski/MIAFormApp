
    <?php 
        session_start();
        $_SESSION['form']='3';
        $_SESSION['user']='66';
        
    ?>
        <!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        <script>
        var formArray=JSON.parse('{"title":"Form-Title","elements":[[1,"text field label"],[2,"text area label"],[3,"Radio button label","1 radio button label","2 radio button label","3 radio button label"],[4,"Check box label","1 combo box label","2 combo box label","3 combo box label"],[6,"date field label"],[5,"email field label"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend>Form-Title</legend>
    <div class="form-element">
                    <legend for="element_66_3_0_1">text field label</legend>
                    <input class="text-field" type="text" name="element_66_3_0_1" id="element_66_3_0" />
                </div><div class="form-element">
                    <legend for="element_66_3_1_2">text area label</legend>
                    <textarea name="element_66_3_1_2" id="element_66_3_1_2" cols="30" rows="10"></textarea>
                </div><div class="form-element">
                    <legend for="element_66_3_2">Radio button label</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="radio-button" type="radio" name="element_66_3_2_3" value="1_radio_button_label" id="element_66_3_2_2">
                    <label for="element_66_3_2_3">Radio button label</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_66_3_2_3" value="2_radio_button_label" id="element_66_3_2_3">
                    <label for="element_66_3_2_3">Radio button label</label>
                </li>
                <li>
                    <input class="radio-button" type="radio" name="element_66_3_2_3" value="3_radio_button_label" id="element_66_3_2_4">
                    <label for="element_66_3_2_3">Radio button label</label>
                </li></ul></div><div class="form-element">
                    <legend for="element_66_3_3">Check box label</legend>
                    <ul class="radio_combo">
                <li>
                    <input class="checkbox" type="checkbox" name="element_66_3_3_4_2" value="1_combo_box_label" id="element_66_3_3_2_4">
                    <label for="element_66_3_3_2_4">Check box label</label>
                </li>
                <li>
                    <input class="checkbox" type="checkbox" name="element_66_3_3_4_3" value="2_combo_box_label" id="element_66_3_3_3_4">
                    <label for="element_66_3_3_3_4">Check box label</label>
                </li>
                <li>
                    <input class="checkbox" type="checkbox" name="element_66_3_3_4_4" value="3_combo_box_label" id="element_66_3_3_4_4">
                    <label for="element_66_3_3_4_4">Check box label</label>
                </li></ul></div><div class="form-element">
                    <legend for="element_66_3_4_6">date field label</legend>
                    <input class="date-field" type="date" name="element_66_3_4_6" id="element_66_3_4" />
                </div><div class="form-element">
                    <legend for="element_66_3_5_5">email field label</legend>
                    <input class="email-field" type="email" name="element_66_3_5_5" id="element_66_3_5" />
                </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 