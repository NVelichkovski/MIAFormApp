function logOut(){
    $.ajax({
        url: '../script/log-out.php',
        success: (data)=>{
            alert(data);
        },
        error: () => { alert("Error")}
    });
    location.replace('../front/login_and_signup.html.php')
}
