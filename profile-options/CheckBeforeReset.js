$(document).ready(function() {
  $('#reset_button').on('click', function(){
    var pass=$('#new_pass').val();
    var repass=$('#renew_pass').val();
    if((pass.length<6)&&(pass==repass))
    {

      $('#slika1').css("display", "inline-block");
      $('.tooltip_1').css("visibility", "visible");
      $('.strelka_1').css("visibility", "visible");
      $('.tooltip_1').css("opacity", "1");
      $('.strelka_1').css("opacity", "1");
      $('#new_pass').val('');
      $('#renew_pass').val('');
    }


    if(pass!=repass)
    {
      $('#slika2').css('display', 'inline-block');
      $('.tooltip').css('visibility', 'visible');
      $('.strelka').css('visibility', 'visible');
      $('.tooltip').css('opacity', '1');
      $('.strelka').css('opacity', '1');
      $('#new_pass').val('');
      $('#renew_pass').val('');
    }
    else if((pass==repass)&&(pass.length>=6))
    {
      //kod za da se smeni vo baza password
    }


  });

  $('#renew_pass').click(function() {
    $('#slika2').css('display', 'none');
    $('.tooltip').css('visibility', 'hidden');
    $('.strelka').css('visibility', 'hidden');
    $('.tooltip').css('opacity', '0');
    $('.strelka').css('opacity', '0');
  });

  $('#new_pass').click(function() {
    $('#slika1').css('display', 'none');
    $('.tooltip_1').css('visibility', 'hidden');
    $('.strelka_1').css('visibility', 'hidden');
    $('.tooltip_1').css('opacity', '0');
    $('.strelka_1').css('opacity', '0');
  });


});
