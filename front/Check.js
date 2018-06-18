function Check()
{
  var validSignUp=true;

  var fullname=document.getElementById('fullname_field_2').value;
  var email=document.getElementById('email_field_2').value;
  var username=document.getElementById('username_field_2').value;
  var password=document.getElementById('pass_field_2').value;
  var repassword=document.getElementById('confirm_field_2').value;

  if(fullname==""||fullname==null)
  {
    document.getElementsByClassName('tooltip_2')[0].style.visibility="visible";
    document.getElementsByClassName('img_2')[0].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[0].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[0].style.opacity='1';
    document.getElementsByClassName('strelka_2')[0].style.opacity='1';
    validSignUp= validSignUp&&false;
  }

  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var test=re.test(String(email).toLowerCase());
  if(test==false&&!(email==""||email==null))
  {
    document.getElementsByClassName('tooltip_2')[1].style.visibility="visible";
    document.getElementById('email_field_2').value=" ";
    document.getElementsByClassName('img_2')[1].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[1].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[1].style.opacity='1';
    document.getElementsByClassName('strelka_2')[1].style.opacity='1';
    document.getElementsByClassName('tooltip_2')[1].innerHTML="Your e-mail format should be: somebody@something.com";
    document.getElementsByClassName('tooltip_2')[1].style.top="-50px";
    document.getElementsByClassName('tooltip_2')[1].style.left="320px";
    document.getElementsByClassName('tooltip_2')[1].style.padding="1.3%";
    document.getElementsByClassName('strelka_2')[1].style.top="-30.5px";
    document.getElementsByClassName('strelka_2')[1].style.left="317.5px";
    document.getElementById('part_two_2').style.marginTop='10.5%';
    document.getElementById('back_login').style.marginTop='-3.5%';
    document.getElementById('forma_2').style.left='-185px';
    /*document.getElementsByClassName('strelka2')[0].style.top="-64px";
    document.getElementsByClassName('strelka2')[0].style.left="276px";
    document.getElementsByClassName('tooltip_2')[1].style.left="87%";
    document.getElementsByClassName('tooltip_2')[1].style.top="-95px";*/
    document.getElementById('forma_2').style.height="96%";
    document.getElementById('forma_2').style.top="-38px";
    document.getElementById('email_field_2').style.marginTop="0";
      validSignUp= validSignUp&&false;
  }
  else if(email==""||email==null)
  {
    document.getElementsByClassName('tooltip_2')[1].innerHTML="Please enter your e-mail";
    document.getElementsByClassName('tooltip_2')[1].style.visibility="visible";
    document.getElementsByClassName('img_2')[1].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[1].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[1].style.opacity='1';
    document.getElementsByClassName('strelka_2')[1].style.opacity='1';
      validSignUp= validSignUp&&false;
  }
  else
  {
    document.getElementsByClassName('tooltip_2')[1].style.visibility="hidden";
    document.getElementById('email_field_2').value=email;
    document.getElementsByClassName('img_2')[1].style.visibility="hidden";
    document.getElementsByClassName('strelka_2')[1].style.visibility="hidden";
    document.getElementsByClassName('tooltip_2')[1].style.opacity='0';
    document.getElementsByClassName('strelka_2')[1].style.opacity='0';
  }

  if(username==""||username==null)
  {
    document.getElementsByClassName('tooltip_2')[2].style.visibility="visible";
    document.getElementsByClassName('img_2')[2].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[2].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[2].style.opacity='1';
    document.getElementsByClassName('strelka_2')[2].style.opacity='1';
      validSignUp= validSignUp&&false;
  }
  else if(!(/^\w+$/.test(username)))
  {
    document.getElementsByClassName('tooltip_2')[2].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[2].innerHTML="Your username should be consist only of letters, numbers and underscore";
    document.getElementsByClassName('tooltip_2')[2].style.padding="1%";
    document.getElementsByClassName('tooltip_2')[2].style.left="425px";
    document.getElementsByClassName('img_2')[2].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[2].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[2].style.opacity='1';
    document.getElementsByClassName('strelka_2')[2].style.opacity='1';
    document.getElementsByClassName('strelka_2')[2].style.left="423px";
      validSignUp= validSignUp&&false;
  }

  if(password==""||password==null)
  {
    document.getElementsByClassName('tooltip_2')[3].style.visibility="visible";
    document.getElementsByClassName('img_2')[3].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[3].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[3].style.opacity='1';
    document.getElementsByClassName('strelka_2')[3].style.opacity='1';
      validSignUp= validSignUp&&false;
  }

  if(repassword==""||repassword==null)
  {
    document.getElementsByClassName('tooltip_2')[4].style.visibility="visible";
    document.getElementsByClassName('img_2')[4].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[4].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[4].style.opacity='1';
    document.getElementsByClassName('strelka_2')[4].style.opacity='1';
      validSignUp= validSignUp&&false;
  }

  if(!(password==repassword)&&password!=""&&repassword!=""&&password.length>=6)
  {
    document.getElementsByClassName('tooltip_2')[4].innerHTML="Password doesn't match";
    document.getElementById('pass_field_2').value="";
    document.getElementById('confirm_field_2').value="";
    document.getElementsByClassName('tooltip_2')[4].style.visibility="visible";
    document.getElementsByClassName('img_2')[4].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[4].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[4].style.opacity='1';
    document.getElementsByClassName('strelka_2')[4].style.opacity='1';
    document.getElementsByClassName('strelka_2')[4].style.left="115px";
      validSignUp= validSignUp&&false;
  }

  if(password.length<6&&password!="")
  {
    document.getElementsByClassName('tooltip_2')[3].innerHTML="Your password should be at least six characters long";
    document.getElementsByClassName('tooltip_2')[3].style.padding="1.3%";
    document.getElementsByClassName('tooltip_2')[3].style.visibility="visible";
    document.getElementsByClassName('img_2')[3].style.visibility="visible";
    document.getElementsByClassName('strelka_2')[3].style.visibility="visible";
    document.getElementsByClassName('tooltip_2')[3].style.opacity='1';
    document.getElementsByClassName('strelka_2')[3].style.opacity='1';
    document.getElementById('pass_field_2').value="";
    document.getElementById('confirm_field_2').value="";
    document.getElementsByClassName('strelka_2')[3].style.left="286.5px";
    document.getElementsByClassName('strelka_2')[3].style.top="-29px";
    document.getElementsByClassName('tooltip_2')[3].style.left="290px";
    document.getElementsByClassName('tooltip_2')[3].style.top="-47px";
    document.getElementById('pass_field_2').value="";
      validSignUp= validSignUp&&false;
  }
return validSignUp;
}
