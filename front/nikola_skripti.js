function goToForm(formHashId) {
    location.replace('http://localhost:63342/MIAFormApp/showresults/showresults.html.php?formHash='+formHashId);
}
function logOut(){
    $.ajax({
        url: '../script/log-out.php',
        error: () => { alert("Error")}
    });
    location.replace('./login_and_signup.html.php')
}
function goToCreateForm() {
    location.replace('http://localhost:63342/MIAFormApp/form-generator/formgenerator.html');
}
