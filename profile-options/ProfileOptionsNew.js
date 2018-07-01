var newName;
var newUsername;
var newEmail;

var name;
var username;
var email;
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$(document).ready(function() {

    $("#name_input").val($("#name").html());
    $("#username_input").val($("#username").html());
    $("#email_input").val($("#email").html())

    name=$("#name").html();
    username=$("#username").html().toUpperCase();
    email=$("#email").html().toUpperCase();

  $('#edit_button').on('click', function(){
    $('#view-1').css('display', 'block');
    $('#view-0').css('display', 'none');
  });

  $('#back_button').on('click', function(){
    $('#view-0').css('display', 'block');
    $('#view-1').css('display', 'none');
  });

  $('#changePassword').on('click', function(){
    $('#view-1').css('display', 'none');
    $('.reset').css('display', 'inline-block');
  });

  $('#change_pass_div').on('click', function(){
    $('.reset').css('display', 'inline-block');
    $('#view-1').css('display', 'none');
  });

  $('#labela').on('click', function(){
    $('.reset').css('display', 'inline-block');
    $('#view-1').css('display', 'none');
  });

  $('#continue').click(function() {
      let password=$("#current_pass").val();
      $.ajax({
          url: "../script/profile-options/check-password.php",
          method: "POST",
          data: {password: password},
          success: (data) => {
              // alert(data);
              if (data==="false")
              {
                  toastr.error("Invalid password");
                  return;
              }
              else if(data==="true"){
                  $('.reset').css('display', 'none');
                  $('.reset_next').css('display', 'inline-block');
              }
          }

      })
  });

  $('#cancel').on('click', function(){
    $('#view-1').css('display', 'block');
    $('.reset').css('display', 'none');
  });

  $('#cancel_2').on('click', function(){
    $('#view-1').css('display', 'block');
    $('.reset_next').css('display', 'none');
    $('#slika1').css('display', 'none');
    $('.tooltip_1').css('visibility', 'hidden');
    $('.strelka_1').css('visibility', 'hidden');
    $('.tooltip_1').css('opacity', '0');
    $('.strelka_1').css('opacity', '0');
    $('#slika2').css('display', 'none');
    $('.tooltip').css('visibility', 'hidden');
    $('.strelka').css('visibility', 'hidden');
    $('.tooltip').css('opacity', '0');
    $('.strelka').css('opacity', '0');
  });

  $('#email_input').change(()=>{
      newEmail=$("#email_input").val().toUpperCase();
      if(!validateEmail(newEmail))
      {
          toastr.error("The email is not in a valid format, please insert valid e-mail address", "Invalid e-mail");
          return;
      }
  })
  $('#save_button').on('click', function(){
      newName=$("#name_input").val();
      newUsername=$("#username_input").val().toUpperCase();
      newEmail=$("#email_input").val().toUpperCase();

      if(!validateEmail(newEmail))
      {
         toastr.error("The email is not in a valid format, please insert valid e-mail address", "Invalid e-mail");
         return;
      }
      alert("email->"+newEmail+" username->"+newUsername+" name->"+newName);
      if (!(newName===name)){
        $.ajax({
            url: '../script/profile-options/change-name.php',
            method: "POST",
            data: {name: newName},
            success:(data)=>{alert(data)},
            error: ()=>{alert("ERROR")}
        })
      }
      if (!(newUsername===username)){
          $.ajax({
              url: '../script/profile-options/change-username.php',
              method: "POST",
              data: {username: newUsername},
              success:(data)=>{
                alert(data)
                  },
              error: ()=>{alert("ERROR")}
          })
      }
      if (!(newEmail===email)){
          $.ajax({
              url: '../script/profile-options/change-email.php',
              method: "POST",
              data: {email: newEmail},
              success:(data)=>{alert(data)},
              error: ()=>{alert("ERROR")}
          })
      }
      location.reload();
  });

  $('#reset_button').on('click', function(){
      password=$("#new_pass").val();
    $.ajax({
        url: "../script/profile-options/change-password.php",
        method: "POST",
        data: {password: password},
        success: (data)=>{
            location.reload();
        }
    })
  });


});

function checkIsUsernameUnique(){
    username=username.toUpperCase();
    if (newUsername==="" || newUsername===username  )
        return;
    $.ajax({
        url: '../script/signup/email-check.php',
        method: "POST",
        data: {username : username},
        success: (data)=>{
            if (data){
                toastr.success("The Username is unique");
            }else {
                toastr.error("There is already account with this Username", "Please try again")
            }
        }
    })
}

function checkIsEmailUnique() {
    if (newEmail==="" || newEmail===email)
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

