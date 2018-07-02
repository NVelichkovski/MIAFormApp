$(document).ready(function() {
  var izbor;
  var i=0;
  var kolku=0;
  var reden_broj=0;
  var elementi=new Array();
  var m=0;
  var p=0;
  var brojac=0;
  var elements=new Array();
  var array;
  var radio_array=new Array();
  var check_array=new Array();
  var broj_radio;
  var broj_check;
  var brojac_radio;
  var brojac_check;
  $add_div1=$('<div></div>');
  $add_div2=$('<div></div>');

  $('select').on('change', function() {
    izbor=$("select :selected").text();
  });

  $('#kolku_radio').on('keydown', function(){
    $broj_radio=$('#kolku_radio').val();
    brojac_radio=$broj_radio;
  });

  $(document.body).on('change', '.ime_radio', function(){
    if(brojac_radio>0)
    {
      radio_array.push($(this).val());
      brojac_radio--;
    }
  });

  $('#kolku_check').on('keydown', function(){
    $broj_check=$('#kolku_check').val();
    brojac_check=$broj_check;
  });

  $(document.body).on('change', '.ime_check', function(){
    if(brojac_check>0)
    {
      check_array.push($(this).val());
      brojac_check--;
    }
  });

  $(document.body).on('change', '.label', function(){
    var element_array=new Array();
    var content=$(this).val();

    if(izbor=="Text field")
    {
      element_array.push(1);
      element_array.push(content);
      elements.push(element_array);
    }
    else if(izbor=="Textarea")
    {
      element_array.push(2);
      element_array.push(content);
      elements.push(element_array);
    }
    else if(izbor=="Radio button group")
    {
      element_array.push(3);
      element_array.push(content);
      for(var i=0;i<radio_array.length;i++)
      {
        element_array.push(radio_array[i]);
      }
      elements.push(element_array);
      radio_array=new Array();
    }
    else if(izbor=="Checkbox group")
    {
      element_array.push(4);
      element_array.push(content);
      for(var j=0;j<check_array.length;j++)
      {
        element_array.push(check_array[j]);
      }
      elements.push(element_array);
      check_array=new Array();
    }
    else if(izbor=="E-mail")
    {
      element_array.push(5);
      element_array.push(content);
      elements.push(element_array);
    }
    else if(izbor=="Date")
    {
      element_array.push(6);
      element_array.push(content);
      elements.push(element_array);
    }
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

      $appendElement=$('<input type="text" placeholder="Label caption:" size="15">');
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

      $appendElement=$('<input type="text" placeholder="Label caption:" size="15">');
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
  window.location.replace("http://localhost:63342/MIAFormApp/front/formlist.html.php");
});

$('#save_button').click(function() {
  if(elements.length==0)
  {
    var i=0;
    var br=elementi.length;
    var element_array=new Array();
    while(i<br)
    {
      var el=elementi[i];
      if(el=="t")
      {
          element_array.push(1);
          element_array.push("Label caption");
          elements.push(element_array);
          element_array=new Array();
      }
      else if(el=="ta")
      {
        element_array.push(2);
        element_array.push("Label caption");
        elements.push(element_array);
        element_array=new Array();
      }
      else if(el=="r")
      {
        element_array.push(3);
        element_array.push("Label caption");
        for(var i=0;i<radio_array.length;i++)
        {
          element_array.push(radio_array[i]);
        }
        elements.push(element_array);
        element_array=new Array();
        radio_array=new Array();
      }
      else if(el=="c")
      {
        element_array.push(4);
        element_array.push("Label caption");
        for(var j=0;j<check_array.length;j++)
        {
          element_array.push(check_array[j]);
        }
        elements.push(element_array);
        element_array=new Array();
        check_array=new Array();
      }
      else if(izbor=="E-mail")
      {
        element_array.push(5);
        element_array.push("Label caption");
        elements.push(element_array);
        element_array=new Array();
      }
      else if(izbor=="Date")
      {
        element_array.push(6);
        element_array.push("Label caption");
        elements.push(element_array);
        element_array=new Array();
      }
      i++;
    }
  }
  if($('#naslov').val()=="")
  {
    array={'title':"Title", 'elements':elements};
  }
  else {
    array={'title':$('#naslov').val(), 'elements':elements};
  }

    $.ajax({
        url: "../script/create-form.php",
        method: "POST",
        data: {form_array: JSON.stringify(array) },
        success: (data)=>{
          // alert(data)
          location.replace("../front/formlist.html.php");},
        error: ()=>{alert("ERROR");}
    })

  //DOPOLNUVANJE NIKOLA

  //NA KRAJ SE VRAKJA NA SVOJATA HOMEPAGE
  //window.location="FormList.html";
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
        elements.splice(indeks, 1);
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
