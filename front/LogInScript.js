function LogInCheck()
{
  canSubmit=true;
  var un= document.getElementById('username_field').value;
  var lozinka=document.getElementById('pass_field').value;

  if(un==""||un==null)
  {
    // document.getElementsByClassName('tooltip')[0].style.visibility='visible';
    // document.getElementsByClassName('strelka')[0].style.visibility='visible';
    // document.getElementById('img1').style.visibility='visible';
    // document.getElementsByClassName('tooltip')[0].style.opacity='1';
    // document.getElementsByClassName('strelka')[0].style.opacity='1';
    canSubmit=canSubmit&&false;
      toastr.error("The username or email field is required", "Log in error")
  }
  // else
  // {
  //   document.getElementsByClassName('tooltip')[0].style.visibility='hidden';
  //   document.getElementsByClassName('strelka')[0].style.visibility='hidden';
  //   document.getElementsByClassName('tooltip')[0].style.opacity='0';
  //   document.getElementsByClassName('strelka')[0].style.opacity='0';
  // }

  if(lozinka==""||lozinka==null)
  {
    // //treba da proveri dali postoi takvo username i password vo bazata na podatoci
    // document.getElementsByClassName('tooltip')[1].style.visibility='visible';
    // document.getElementsByClassName('strelka')[1].style.visibility='visible';
    // document.getElementById('img2').style.visibility='visible';
    // document.getElementsByClassName('tooltip')[1].style.opacity='1';
    // document.getElementsByClassName('strelka')[1].style.opacity='1';
      canSubmit=canSubmit&&false;
      toastr.error("The password field is required", "Log in error")
  }
  // else
  // {
  //   //treba da proveri dali postoi takvo username i password vo bazata na podatoci
  //   document.getElementsByClassName('tooltip')[1].style.visibility='hidden';
  //   document.getElementsByClassName('strelka')[1].style.visibility='hidden';
  //   document.getElementsByClassName('tooltip')[1].style.opacity='0';
  //   document.getElementsByClassName('strelka')[1].style.opacity='0';
  //
  // }
  if(canSubmit)
  {
      data={
          'username_email' : $("#username_field").val(),
          'password' : $("#pass_field").val(),
          'remember_me' : $("#check").is(':checked')
          }
  $.ajax({
    type: "POST",
    url: "../script/login-user.php",
    data: {data: data}, // serializes the form's elements.
    success: function(data)
    {
        if(data=='false'){
          window.location.assign("../front/formlist.html.php");
        }else{
          if(data==="password")
              toastr.error("Incorect password","Log in problem")
          if(data==="username_email")
              toastr.error("There is no account with this username or email address", "Log in problem")
        }
    },
    error: () => {
    }
  });

  }
  return false;
}
