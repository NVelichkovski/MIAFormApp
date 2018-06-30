var formArray= [];
formArray['title']="Title";
formArray['elements']=[];

function updateTitle() {
    formArray['title']=$("#naslov").val();
}

function addElement() {
    var elementId=$("#combobox").val();
    if (parseInt(elementId)===1){
        formArray['elements']
    }
}

