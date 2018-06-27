<?php 
    session_start();
    require_once "db.php";
    require_once "variables.php";
    
    function textFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <input class="text-field" type="text" name="'.$identifier.'_1" id="'.$identifier.'" />
                </div>';
    }

    function dateFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <input class="date-field" type="date" name="'.$identifier.'_6" id="'.$identifier.'" />
                </div>';
    }

    function emailFieldCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <input class="email-field" type="email" name="'.$identifier.'_5" id="'.$identifier.'" />
                </div>';
    }

    function textAreaCode($indexForm,$indexElement, $elementArray, $numColumns=30, $numRows=10){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <textarea name="'.$identifier.'_2" id="'.$identifier.'" cols="30" rows="10">Zdravo</textarea>
                </div>';
    }

    function radioButtonsCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
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
                    <label for="'.$identifier."_".$key.'">'.$label.'</label>
                </li>';
        }
        $returnString.='</ul></div>';   
        return $returnString;    
    }

    function checkBoxCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user_info']['id'].'_'.$indexForm.'_'.$indexElement;
        $returnString= '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <ul class="radio_combo">';
        foreach ($elementArray as $key => $value) {
            if ($key==1||$key==0) {
                continue;
            }
            $returnString.='
                <li>
                    <input class="checkbox" type="checkbox" name="'.$identifier."_4/".$key.'" value="'.str_replace(" ","_",$value).'" id="'.$identifier."/".$key.'">
                    <label for="'.$identifier."/".$key.'">'.$label.'</label>
                </li>';
        }
        $returnString.='</ul></div>';   
        return $returnString;    
    }
    
    $formArray = array(
        'title' => 'Form-Title',
        'elements'=> array(
            array(TEXT_FIELD, 'text field label'),
            array(TEXT_AREA, 'text area label'),
            array(
                RADIO_BUTTON,
                'Radio button label',
                '1 radio button label',
                '2 radio button label',
                '3 radio button label'
            ),
            array(
                CHECK_BOX,
                'Check box label',
                '1 combo box label',
                '2 combo box label',
                '3 combo box label'
            ),
            array(DATE_FIELD, "date field label"),
            array(EMAIL_FIELD, "email field label")
            )
        );
        
        $formId=addForm($_SESSION['user_info']['id'], $formArray['title']);
        createFormTable();
        $formString='
        <!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        </head>
    <body>
    <form action="save-info.php" method="post">
    <fieldset>
    <legend>'.$formArray['title'].'</legend>
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
    <br>
    <button type="submit">Submit</button>
    </fieldset>
    </form>
    </body>
    </html> ';
    $formHash=getFormHashById($_SESSION['user_info']['id'],$formId);
    mkdir("../users/".$_SESSION['user_info']['hash_id']."/".$formHash, 0755, true);
    $file = fopen("../users/".$_SESSION['user_info']['hash_id']."/".$formHash."/index.html", "w") or die("Unable to to create the form!");
    fwrite($file, $formString);
    fclose($file);
    closeConnection();
    header("Location: ../front/formlist.html.php");

   