const DIRTY_NAME=1;
const DIRTY_USERNAME=2;
const DIRTY_EMAIL=3;

var dirty = {};
function isDirty() {
    values = getFormValues();
    if (form['name'] != name) dirty.push(DIRTY_NAME);
    else {
        index = dirty.indexOf(DIRTY_NAME);
        if (index > -1) {
            dirty.splice(index, 1);
        }
    }
    if (form['username'] != username) dirty.push(DIRTY_USERNAME);
    else {
        index = dirty.indexOf(DIRTY_USERNAME);
        if (index > -1) {
            dirty.splice(index, 1);
        }
    }
    if (form['email'] != email) dirty.push(DIRTY_EMAIL);
    else {
        index = dirty.indexOf(DIRTY_EMAIL);
        if (index > -1) {
            dirty.splice(index, 1);
        }
    }
    return dirty.length!=0;
}

var name;
var username;
var email;

function getFormValues() {
    var $inputs = $('#edit-form :input');
    values = {};
    $inputs.each(function () {
        values[this.name] = $(this).val();
    });
    return values;
}

$(function () {
    var userDiv = $('#user-info');
    var userEditDiv = $('#user-info-edit');
    var form = document.forms['edit'];

    userEditDiv.hide();

    $('#edit-button').click(function () {
        userDiv.hide();
        userEditDiv.show();

        name = $('#user-name').html();
        username = $('#user-username').html();
        email = $('#user-email').html();

        form['name'].value = name;
        form['username'].value = username;
        form['email'].value = email;

    })
});

function saveButtonHendler() {

    if (isDirty()) {
        if(dirty.indexOf(DIRTY_NAME)>-1)
        $.ajax({
            
        });
        toastr.success("User Info is changed");
        return true;
    }

    userDiv.show();
    userEditDiv.hide();
    return false;

}