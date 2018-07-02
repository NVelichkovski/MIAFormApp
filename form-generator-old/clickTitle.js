$(document).ready(function() {
var state = true;

$("#content").on('click', function() {
    $('#content').css('background-color', 'rgba(237, 237, 222, 0.9)');
    $('#content').css("border", state ? '2px solid rgba(0, 0, 0, 0.2)' : 'none');
    state = !state;
});

});
