<?php 
    define("TEXT_FIELD",1,true);
    define("TEXT_AREA",2,true);
    define("RADIO_BUTTON",3,true);
    define("COMBO_BOX",4,true);
    define("EMAIL",5,true);
    define("DATE",6,true);

    function textInputCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user-info']['id'].'/'.$indexForm.'/'.$indexElement;
        return '<div class="form-element">
                    <legend for="'.$identifier.'">'.$label.'</legend>
                    <input type="text" name="'.$identifier.'" id="'.$identifier.'" />
                </div>';
    }
    function textAreaCode($indexForm,$indexElement, $elementArray, $numColumns=30, $numRows=10){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user-info']['id'].'/'.$indexForm.'/'.$indexElement;
        return '<div class="form-element">
                    <label for="'.$identifier.'">'.$label.'</label>
                    <textarea name="'.$identifier.'" id="'.$identifier.'" cols="30" rows="10">Zdravo</textarea>
                </div>';
    }
    function radioButtonsCode($indexForm,$indexElement, $elementArray){
        $label=$elementArray[1];
        $identifier='element'.$_SESSION['user-info']['id'].'/'.$indexForm.'/'.$indexElement;
        $returnString= '<div class="form-element">
                    <label for="'.$identifier.'">'.$label.'</label>
                    <ul class="radio_combo">';
        foreach ($elementArray as $key => $value) {
            if ($key==1||$key==0) {
                continue;
            }
            $returnString+='';

        }
        $returnString.='</ul></div>';       
    }

    session_start();
    $formArray = array(
        'title' => 'Form Title',
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
                COMBO_BOX,
                'Combo box label',
                '1 combo box label',
                '2 combo box label',
                '3 combo box label'
            )
        )
    );

    $strForm='
        div

        <form> 
            <label class="title">'.$formArray['title'].'</label>
    ';
    foreach ($formArray['elements'] as $key => $value) {
        
    }

    $strForm.='
        </form>
    ';