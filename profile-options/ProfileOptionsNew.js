function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$(document).ready(function() {

    $("#name_input").val($("#name").html());
    $("#username_input").val($("#username").html());
    $("#email_input").val($("#email").html())

    let name=$("#name").html();
    let username=$("#username").html().toUpperCase();
    let email=$("#email").html().toUpperCase();

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
      $('.reset').css('display', 'none');
      $('.reset_next').css('display', 'inline-block');
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

  $('#save_button').on('click', function(){
      newName=$("#name_input").val().toUpperCase();
      newUsername=$("#username_input").val().toUpperCase();
      newEmail=$("#email_input").val().toUpperCase();

      if(!validateEmail(newEmail))
      {
         toastr.error("The email is not in a valid format, please insert valid e-mail address", "Invalid e-mail");
         return;
      }
      alert(newEmail+" "+newUsername+" "+newName);
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

  });

});
