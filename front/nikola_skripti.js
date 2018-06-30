function goToForm(formHashId) {
    location.replace('http://localhost/miaformapp/profile-options/profileoptions.html.php?hash='+formHashId);
}
function logOut(){
    $.ajax({
        url: '../script/log-out.php',
        success: (data)=>{
            alert(data);
        },
        error: () => { alert("Error")}
    });
    location.replace('./login_and_signup.html.php')
}
