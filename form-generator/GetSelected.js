$(document).ready(function() {
  var izbor;
  var i=0;
  var kolku=0;
  var reden_broj=0;
  var elementi=new Array();
  var formAray=new Array();
  formAray['title']=
  var m=0;
  var p=0;
  var brojac=0;
  $add_div1=$('<div></div>');
  $add_div2=$('<div></div>');
  $('select').on('change', function() {
    izbor=$("select :selected").text();
  });

  $("button").on('click', function() {
    if(izbor=="Text field")
    {
      $div=$('<div></div>');
      $div.addClass('dodaden');
      if(i==0)
      {
        $('.custom_form').append('<br>');
      }
      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.attr('class', 'sl_text');
      $slika.attr('id',reden_broj);

      $appendElement=$('<input type="text" placeholder="" size="30">');
      $appendElement1=$('<input type="text" placeholder="Label caption:" size="15">');
      $appendElement.addClass('text_field');
      $appendElement1.addClass('label');
      $($div).append($appendElement1);
      $($div).append(' ');
      $($div).append($appendElement);
      $($div).append($slika);
      $($div).append('<br>');
      $('.custom_form').append($div);
      elementi.push("t");
      i++;
      reden_broj++;
    }
    else if(izbor=="Date")
    {
      $div=$('<div></div>');
      $div.addClass('dodaden');

      if(i==0)
      {
        $('.custom_form').append('<br>');
      }

      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.addClass('sl_data');
      $slika.attr('id',reden_broj);

      $appendElement=$('<input type="text" placeholder="Date:" size="15">');
      $appendElement.addClass('label');
      $appendElement1=$('<input type="date" placeholder="mm/dd/yyyy"><br>');
      $appendElement1.addClass('text_field');
      $($div).append($appendElement);
      $($div).append(' ');
      $($div).append($appendElement1);
      $($div).append($slika);
      $('.custom_form').append($div);
      elementi.push("d");
      i++;
      reden_broj++;
    }
    else if(izbor=="Radio button group")
    {
      if(i==0)
      {
        $('.custom_form').append('<br>');
      }

      $('.dialog_background').show();
      $('#dialog').show();

      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.addClass('sl_radio');
      $slika.attr('id',reden_broj);

      elementi.push("r");
      i++;
      reden_broj++;
      m++;
    }
    else if(izbor=="Checkbox group")
    {
      if(i==0)
      {
        $('.custom_form').append('<br>');
      }

      $('.dialog_background').show();
      $('#dialog_check').show();

      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.addClass('sl_check');
      $slika.attr('id',reden_broj);

      elementi.push("c");
      i++;
      reden_broj++;
      m++;
    }
    else if(izbor=="E-mail")
    {
      if(i==0)
      {
        $('.custom_form').append('<br>');
      }

      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.attr('class', 'sl_mail');
      $slika.attr('id',reden_broj);

      $appendElement=$('<input type="text" placeholder="Email:" size="15">');
      $appendElement1=$('<input type="email" name="mail" placeholder="" size="30"><br>');
      $appendElement.addClass('label');
      $appendElement1.addClass('text_field');
      $div=$('<div></div>');
      $div.addClass('dodaden');
      $($div).append($appendElement);
      $($div).append(' ');
      $($div).append($appendElement1);
      $($div).append($slika);
      $('.custom_form').append($div);
      elementi.push("e");
      i++;
      reden_broj++;
    }
    else if(izbor=="Textarea")
    {
      if(i==0)
      {
        $('.custom_form').append('<br>');
      }
      $slika=$('<img alt="bin">');
      $slika.attr('src', 'closed.png');
      $slika.attr('class', 'sl_textarea');
      $slika.attr('id',reden_broj);

      $appendElement=$('<input type="text" placeholder="Label caption:" size="15">');
      $appendElement1=$('<textarea rows="8" cols="30">Your text...</textarea><br>');
      $appendElement.addClass('label');
      $appendElement1.addClass('text_area');
      $div=$('<div></div>');
      $div.addClass('dodaden');
      $div.append($appendElement);
      $div.append($appendElement1);
      $div.append($slika);
      $('.custom_form').append($div);
      elementi.push("ta");
      i++;
      reden_broj++;
    }
  });

  $('#content').on( 'change keyup keydown paste cut', 'textarea', function (){
    $(this).height(0).height(this.scrollHeight);
}).find( 'textarea' ).change();

$('#clear_button').on('click', function(){
  $('.custom_form').html(' ');
  $('textarea').val("");
  reden_broj=0;
  i=0;
  kolku=0;
  elementi.length=0;
});

$('#cancel_button').on('click', function(){
  window.location="FormList.html";
});

$('#save_button').click(function() {
  //SAVE VO BAZA KOD
});

$('#done_button').on('click', function(){
  $('.dodadi').hide();
  $('.buttons').hide();
  $('.button_submit').css('display','inline');
  $('.additional_menu').css('display','inline');
  $('#form_div').attr('height','auto');
});

$('#edit_button').on('click', function(){
  $('.dodadi').show();
  $('.buttons').show();
  $('.button_submit').css('display','none');
  $('.additional_menu').css('display','none');
});

$('#discard_button').on('click', function() {
    window.location="FormList.html";
});

//brisenje na elementi
$(document.body).on('click', 'img', function(){
  var br=$(this).attr('id');
  el=elementi[br];
  pamti=br;
  indeks_div=$(this).parent().prevAll().length;

  if(elementi.indexOf(el)==-1)
  {
    while(br!=(indeks_div-1)){
      --br;
      el=elementi[br];
    }
  }

  if(br!=(indeks_div-1))
  {
    while(br!=(indeks_div-1))
    {
      --br;
      el=elementi[br];
    }
  }

      $('.dodaden:eq('+(br)+')').remove();
      indeks=elementi.indexOf(el);
      if (indeks > -1) {
        elementi.splice(indeks, 1);
      }
      $('img:eq('+(br-1)+')').css('display', 'none');
      if(elementi.length==0)
      {
        reden_broj=0;
      }
});

$(document.body).on('dblclick', '.pocetok', function(){
  $(this).remove();
  $('.sl').css('display', 'none');
  $('img').css('display', 'none');
});

$(document.body).on('mouseover', '.dodaden', function(){
  var index=$(this).index();
  var indeks_slika=index-1;
  var el=elementi[index-1];
  if(el=="t")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
  else if(el=="d")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
  else if(el=="ta")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
  else if(el=="e")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
});

$(document.body).on('mouseover', '.dodaden', function(){
  var index=$(this).index();
  var indeks_slika=index-1;
  var el=elementi[index-1];

 if(el=="r")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
  else if(el=="c")
  {
    $('img:eq('+indeks_slika+')').css('display', 'inline-block');
  }
});

$(document.body).on('mouseleave', '.dodaden', function(){
  $('.sl').css('display','none');
  var index=$(this).index();
  var indeks_slika=index-1;
  var el=elementi[index-1];

  if(el=="t")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
  else if(el=="d")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
  else if(el=="ta")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
  else if(el=="e")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
});

$(document.body).on('mouseleave', '.dodaden', function(){
  $('.sl').css('display','none');
  var index=$(this).index();
  var indeks_slika=index-1;
  var el=elementi[index-1];

  if(el=="r")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
  else if(el=="c")
  {
    $('img:eq('+indeks_slika+')').css('display', 'none');
  }
});

});
