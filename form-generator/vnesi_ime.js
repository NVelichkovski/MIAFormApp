$(document).ready(function() {
  var i=1;
  var j=0;
  var k=0;
  arrayNames=new Array();

  $('#kolku_radio').keydown(function (e){
    if(e.keyCode == 13){
      $el=$('#kolku_radio').val();
      while($el>0)
      {
        $append=$('<input type="text" size="13">');
        $append.addClass('ime_radio');
        $text=$('<span>Radio button '+i+': </span>');
        $text.addClass('tekst_radio');
        $('.radio_group').append($text);
        $('.radio_group').append($append);
        $('.radio_group').append('<br><br>');
        $el--;
        i++;
      }
      $('#generate').css('display','inline-block');
      $('#cancel_generate').css('display','inline-block');
      $('.message_1').hide();
    }
});

$('.dialog_background').on('click', function() {
  $('.dialog_background').hide();
  $('#dialog').hide();
  $('.message_1').show();
  $('.radio_group').html('');
  $('#kolku_radio').val('');
  $('#generate').css('display','none');
  $('#cancel_generate').css('display','none');
});

$('#generate').on('click', function(){
  $('.message_1').hide();
  $add_div1=$('<div></div>');
  $add_div1.addClass('dodaden');

  if(j==0)
  {
    $appendElement=$('<input type="text" placeholder="Label caption:" size="15">');
    $appendElement.addClass('label');
    $($add_div1).append($appendElement);
    $($add_div1).append(' ');
  }

  while(j<i)
  {
    arrayNames[j]=$('.ime_radio:eq('+j+')');
    j++;
  }

  k=0;

  while(k<j-1)
  {
    $div1=$('<div></div>');
    $div1.addClass('tekst');
    $label=$('<label></label>');
    $label.addClass('container2');
    $input=$('<input type="radio" name="radio_button">');
    $span=$('<span></span>');
    $span.addClass('checkmark2');
    $div1.append(arrayNames[k].val());
    $label.append($div1);
    $label.append(' ');
    $label.append($input);
    $label.append($span);
    $add_div1.append($label);
    k++;
  }

  if(k==j-1)
  {

    $('#dialog').hide();
    $('.dialog_background').hide();
    $add_div1.append($slika);
    $('.custom_form').append($add_div1);

    $('.radio_group').html('');
    $('#kolku_radio').val('');
    $('.message_1').show();
    $('#generate').css('display','none');
    $('#cancel_generate').css('display','none');
    j=0;
    k=0;
    i=1;
  }
});

$('#cancel_generate').on('click', function() {
  $('#dialog').hide();
  $('.dialog_background').hide();
  $('.radio_group').html('');
  $('#kolku_radio').val('');
  $('#generate').css('display','none');
  $('#cancel_generate').css('display','none');
  $('.message_1').show();
  j=0;
  k=0;
  i=1;
});

});
