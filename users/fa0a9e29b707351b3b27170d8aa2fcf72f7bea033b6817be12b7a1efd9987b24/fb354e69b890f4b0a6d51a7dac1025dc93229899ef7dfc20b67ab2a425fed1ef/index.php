
    <?php 
        session_start();
        $_SESSION['form']='3';
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
        var formArray=JSON.parse('{"title":"Party invitation","elements":[[1,"Fullname"],[6,"Reservation date"],[5,"Contact e-mail"],[2,"Comment"]]}');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">Party invitation</legend>
    <div class="form-element">
    <div class="form-element">
                    <legend for="element_1_3_0_1">Fullname</legend>
                    <input class="text-field" type="text" name="element_1_3_0_1" id="element_1_3_0" />
                </div><div class="form-element">
                    <legend for="element_1_3_1_6">Reservation date</legend>
                    <input class="date-field" type="date" name="element_1_3_1_6" id="element_1_3_1" />
                </div><div class="form-element">
                    <legend for="element_1_3_2_5">Contact e-mail</legend>
                    <input class="email-field" type="email" name="element_1_3_2_5" id="element_1_3_2" />
                </div><div class="form-element">
                    <legend for="element_1_3_3_2">Comment</legend>
                    <textarea name="element_1_3_3_2" id="element_1_3_3_2" cols="30" rows="10"></textarea>
                </div>
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> 