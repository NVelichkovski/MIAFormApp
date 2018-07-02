<?php 
    session_start();
    require_once "db.php";
    require_once "variables.php";
    function textFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'_1">'.$label.'</legend>
                    <input class="text-field" type="text" name="'.$identifier.'_1" id="'.$identifier.'" />
                </div>';
    }

    function dateFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'_6">'.$label.'</legend>
                    <input class="date-field" type="date" name="'.$identifier.'_6" id="'.$identifier.'" />
                </div>';
    }

    function emailFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'_5">'.$label.'</legend>
                    <input class="email-field" type="email" name="'.$identifier.'_5" id="'.$identifier.'" />
                </div>';
    }

    function textAreaCode($indexForm,$indexElement, $elementArray, $numColumns=30, $numRows=10){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'_2">'.$label.'</legend>
                    <textarea name="'.$identifier.'_2" id="'.$identifier.'_2" cols="30" rows="10"></textarea>
                </div>';
    }

    function radioButtonsCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        $returnString= '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <ul class="radio_combo">';
        foreach ($elementArray as $key => $value) {
            if ($key==1||$key==0) {
                continue;
            }
            $returnString.='
                <li>
                    <input class="radio-button" type="radio" name="'.$identifier.'_3" value="'.str_replace(" ","_",$value).'" id="'.$identifier."_".$key.'">
                    <label for="'.$identifier.'_3">'.$elementArray[$key].'</label>
                </li>';
        }
        $returnString.='</ul></div>';
        return $returnString;
    }

    function checkBoxCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element_'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        $returnString= '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <ul class="radio_combo">';
        foreach ($elementArray as $key => $value) {
            if ($key==1||$key==0) {
                continue;
            }
            $returnString.='
                <li>
                    <input class="checkbox" type="checkbox" name="'.$identifier.'_'.$key.'_4" value="'.str_replace(" ","_",$value).'" id="'.$identifier."_".$key.'_4">
                    <label for="'.$identifier."_".$key.'_4">'.$elementArray[$key].'</label>
                </li>';
        }
        $returnString.='</ul></div>';
        return $returnString;
    }

        $formArray=json_decode($_POST['form_array'], True);
        if (!isset($formArray))
        {
            $_SESSION['error']="Form array is not set";
            echo "false";
//            header("Location: http://localhost/miaformapp/front/404/index.html.php");
            exit();
        }
        
        $formId=addFormInDb($_SESSION['user_info']['id'], $formArray['title']);
//        echo "Form id is $formId <br>";
        if (!$formId)
        {
            $_SESSION['error']=mysqli_error($conn)+$formId;
//            header("Location: http://localhost/miaformapp/front/404/index.html.php");
                echo "false";
            exit();
        }
        $queryRez=createFormTable($_SESSION['user_info']['id'], $formId, $formArray['elements']);
//        echo mysqli_error($conn);
//        die("ERROR with creating form");
//        echo "<br> Create form table result<br>";
        $formHash=getFormHashById($_SESSION['user_info']['id'],$formId);
        var_dump($queryRez); echo "<br>";
        $arrayJSON=json_encode($formArray);
//        $arrayJSON=$_POST['form-array'];
        $formString='
    <?php 
        session_start();
        $_SESSION[\'form\']=\''.$formId. '\';
        $_SESSION[\'user\']=\''.$_SESSION['user_info']['id']. '\';
        
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
        var formArray=JSON.parse(\''.$arrayJSON.'\');
        </script>
        </head>
    <body>
    <form action="../../../script/save-info.php" method="post">
    <fieldset>
    <legend id="title">'.$formArray['title'].'</legend>
    <div class="form-element">
    ';
    foreach ($formArray['elements'] as $key => $value) {
        switch ($value[0]) {
            case TEXT_FIELD:
                $formString.=textFieldCode($formId,$key,$value);
                break;
            case TEXT_AREA:
                $formString.=textAreaCode($formId,$key,$value);
                break;
            case RADIO_BUTTON:
                $formString.=radioButtonsCode($formId,$key,$value);
                break;
            case CHECK_BOX:
                $formString.=checkBoxCode($formId,$key,$value);
                break;
            case EMAIL_FIELD:
                $formString.=emailFieldCode($formId,$key,$value);
                break;
            case DATE_FIELD:
                $formString.=dateFieldCode($formId,$key,$value);
                break;
        }
    }

    $formString.='
    </div>
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> ';
   
    mkdir("../users/".$_SESSION['user_info']['hash_id']."/".$formHash, 0755, true);
    $file = fopen("../users/".$_SESSION['user_info']['hash_id']."/".$formHash."/index.php", "w") or die("Unable to create the form!");
    fwrite($file, $formString);
    fclose($file);
    $file=fopen("../users/".$_SESSION['user_info']['hash_id']."/".$formHash."/form.json", "w") or die("Unable to create the form");
    fwrite($file,json_encode($formArray));
    fclose($file);
    closeConnection();
    echo 'true';
   