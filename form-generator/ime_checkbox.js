$(document).ready(function() {
  var i=1;
  var j=0;
  var k=0;
  arrayNames=new Array();

  $('#kolku_check').keydown(function (e){
    if(e.keyCode === 13){
      $el=$('#kolku_check').val();
      while($el>0)
      {
        $append=$('<input type="text" size="13">');
        $append.addClass('ime_check');
        $text=$('<span>Checkbox '+i+': </span>');
        $text.addClass('tekst_check');
        $('.check_group').append($text);
        $('.check_group').append($append);
        $('.check_group').append('<br><br>');
        $el--;
        i++;
      }
      $('#generate_check').css('display','inline-block');
      $('#cancel_generate_check').css('display','inline-block');
      $('.message').hide();
    }
});

$('.dialog_background').on('click', function() {
  $('.dialog_background').hide();
  $('#dialog_check').hide();
  $('.message').show();
  $('.check_group').html('');
  $('#kolku_check').val('');
  $('#generate_check').css('display','none');
  $('#cancel_generate_check').css('display','none');
});

$('#generate_check').on('click', function(){



  $add_div2=$('<div></div>');
  $add_div2.addClass('dodaden');

  if(j==0)
  {
    $appendElement=$('<input type="text" placeholder="Label caption:" size="15">');
    $appendElement.addClass('label');
    $($add_div2).append($appendElement);
    $($add_div2).append(' ');
  }

  while(j<i)
  {
    arrayNames[j]=$('.ime_check:eq('+j+')');
    j++;
  }
  k=0;

  while(k<j-1)
  {
    $div1=$('<div></div>');
    $div1.addClass('tekst');
    $label=$('<label></label>');
    $label.addClass('container');
    $input=$('<input type="checkbox" name="check">');
    $span=$('<span></span>');
    $span.addClass('checkmark');
    $div1.append(arrayNames[k].val());
    $label.append($div1);
    $label.append(' ');
    $label.append($input);
    $label.append($span);
    $add_div2.append($label);
    k++;
  }


  if(k==j-1)
  {
    $('#dialog_check').hide();
    $('.dialog_background').hide();
    $add_div2.append($slika);
    $('.custom_form').append($add_div2);

    $('.check_group').html('');
    $('#kolku_check').val('');
    $('.message').show();
    $('#generate_check').css('display','none');
    $('#cancel_generate_check').css('display','none');
    j=0;
    k=0;
    i=1;
  }

});

$('#cancel_generate_check').on('click', function() {
  $('#dialog_check').hide();
  $('.dialog_background').hide();
  $('.check_group').html('');
  $('#kolku_check').val('');
  $('#generate_check').css('display','none');
  $('#cancel_generate_check').css('display','none');
  $('.message').show();
  j=0;
  k=0;
  i=1;
});
});
