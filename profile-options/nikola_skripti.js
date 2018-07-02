function logOut(){
    $.ajax({
        url: '../script/log-out.php',
        error: () => { alert("Error")}
    });
    location.replace('../front/login_and_signup.html.php')
}
