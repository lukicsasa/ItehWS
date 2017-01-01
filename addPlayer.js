$(document).ready(function () {
    getClubs();
    getPositions();

    $('#date-picker input').datepicker({
        todayBtn: "linked",
        language: "en-GB",
        orientation: "bottom auto"
    })
});

function addPlayer() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var nationality = $('#nationality').val();
    var date_of_birth = $('#date_of_birth').val();
    var height = $('#height').val();
    var foot = $('input[name=foot]:checked').val();
    var club = $('#clubs').val();
    var position = $('#positions').val();

    $.ajax({
        type: "POST",
        url: 'player/add',
        data: {
            first_name: first_name,
            last_name: last_name,
            nationality: nationality,
            date_of_birth: date_of_birth,
            height: height,
            foot: foot,
            club: parseInt(club),
            position: parseInt(position)
        },
        success: function () {
            window.location.href = 'players.php';
        },
        error: function (error) {
            alert("Error: " + JSON.parse(error));
        }
    });
}


function getClubs() {
    $.ajax({
        type: "GET",
        url: 'club/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#clubs').append('<option value=""> There are no clubs available.</option>');
            }
            else {
                var clubs = response;
                $('#clubs').append('<option value=" ">Select club</option>');
                for(var i = 0; i < clubs.length; i++) {
                    $('#clubs').append("<option value=" + clubs[i].id + ">" + clubs[i].name + "</option>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getPositions() {
    $.ajax({
        type: "GET",
        url: 'position/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#positions').append('<option value=""> There are no positions available.</option>');
            }
            else {
                var positions = response;
                $('#positions').append('<option value=" ">Select position</option>');
                for(var i = 0; i < positions.length; i++) {
                    $('#positions').append("<option value=" + positions[i].id + ">" + positions[i].name + "</option>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}
