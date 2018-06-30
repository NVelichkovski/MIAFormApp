function SignUpFunction()
{
  document.getElementById("part_three").style.display="block";
  document.getElementById("back_login").style.display="inline";
  document.getElementById("part_two").style.display="none";
  //window.location="SignUp.html";
}
function checkIsEmailUnique() {
    var email=$("#email_field_2").val();
    if (email==="")
      return;
    $.ajax({
        url: '../script/signup/email-check.php',
        method: "POST",
        data: {email : email},
        success: (data)=>{
          if (data){
            if ($("#email_field_2").hasClass('error')){
                $("#email_field_2").removeClass('error');
            }
            toastr.success("The email is unique");
          }else {
            if (!$("#email_field_2").hasClass('error'))
                $("#email_field_2").addClass('error');
            toastr.error("There is already account with this email", "Please try again")
          }
        }
    })
}

function chckIsUsernameUnique() {
    var username=$("#username_field_2").val();
    if (username==="")
        return;
    $.ajax({
        url: '../script/signup/username-check.php',
        method: "POST",
        data: {username : username},
        success: (data)=>{
            if (data){
                if ($("#username_field_2").hasClass('error')){
                    $("#username_field_2").removeClass('error');
                }
                toastr.success("The username is unique");
            }else {
                if (!$("#username_field_2").hasClass('error'))
                    $("#username_field_2").addClass('error');
                toastr.error("There is already account with this username", "Please try again")
            }
        }
    })
}