
function LogInCheck()
{
  canSubmit=true;
  var un= document.getElementById('username_field').value;
  var lozinka=document.getElementById('pass_field').value;

  if(un==""||un==null)
  {
    document.getElementsByClassName('tooltip')[0].style.visibility='visible';
    document.getElementsByClassName('strelka')[0].style.visibility='visible';
    document.getElementById('img1').style.visibility='visible';
    document.getElementsByClassName('tooltip')[0].style.opacity='1';
    document.getElementsByClassName('strelka')[0].style.opacity='1';
    canSubmit=canSubmit&&false;
  }
  else
  {
    document.getElementsByClassName('tooltip')[0].style.visibility='hidden';
    document.getElementsByClassName('strelka')[0].style.visibility='hidden';
    document.getElementsByClassName('tooltip')[0].style.opacity='0';
    document.getElementsByClassName('strelka')[0].style.opacity='0';
  }

  if(lozinka==""||lozinka==null)
  {
    //treba da proveri dali postoi takvo username i password vo bazata na podatoci
    document.getElementsByClassName('tooltip')[1].style.visibility='visible';
    document.getElementsByClassName('strelka')[1].style.visibility='visible';
    document.getElementById('img2').style.visibility='visible';
    document.getElementsByClassName('tooltip')[1].style.opacity='1';
    document.getElementsByClassName('strelka')[1].style.opacity='1';
      canSubmit=canSubmit&&false;
  }
  else
  {
    //treba da proveri dali postoi takvo username i password vo bazata na podatoci
    document.getElementsByClassName('tooltip')[1].style.visibility='hidden';
    document.getElementsByClassName('strelka')[1].style.visibility='hidden';
    document.getElementsByClassName('tooltip')[1].style.opacity='0';
    document.getElementsByClassName('strelka')[1].style.opacity='0';

  }
  return canSubmit;
}

