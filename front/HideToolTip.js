function HideTooltip1()
{
  if(document.getElementsByClassName('tooltip')[0].style.visibility=='visible')
  {
    document.getElementsByClassName('tooltip')[0].style.visibility='hidden';
    document.getElementsByClassName('strelka')[0].style.visibility='hidden';
    document.getElementById('img1').style.visibility='hidden';
  }
}


function HideTooltip2()
{
  if(document.getElementsByClassName('tooltip')[1].style.visibility=='visible')
  {
    document.getElementsByClassName('tooltip')[1].style.visibility='hidden';
    document.getElementsByClassName('strelka')[1].style.visibility='hidden';
    document.getElementById('img2').style.visibility='hidden';
  }
}
