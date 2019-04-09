/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CurrentVenue  = 0;
function SetCurrentVenue(value){
    CurrentVenue = value;
}

function ChangeMode(mode){
    switch (mode){
        case 'login':
            $('#Form_login').removeClass('d-none');
            $('#Form_register').addClass('d-none');
            break;
        case 'register':
            $('#Form_register').removeClass('d-none');
            $('#Form_login').addClass('d-none');
            break;
    }
}

function NewVenue(){
    if($('#venueName').val() != ''){
        $.ajax({
            data: { nom: $('#venueName').val() },
            type: "POST",
            url: "new_venue.php",
            success: function(response) {
                location.reload();
            }
        });
    }
    else{
        $('#venueAlert').html('Le nom de lieu est obligatoire!').removeClass('d-none');
    }
}

function DeleteVenue(){
    $.ajax({
        data: { venue: CurrentVenue },
        type: "POST",
        url: "delete.php",
        success: function(response) {
            location.reload();
        }
    });
}

function NewEvent(){
    if($('#eventName').val() != ''){
        var postData = {
            "nom" : $('#eventName').val(),
            "venue" : CurrentVenue
        };
        $.ajax({
            data: postData,
            type: "POST",
            url: "new_event.php",
            success: function(response) {
                location.reload();
            }
        });
    }
    else{
        $('#eventAlert').html("Le nom de l'événement est obligatoire!").removeClass('d-none');
    }
}