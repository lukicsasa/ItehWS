$(document).ready(function () {
    getPlayer($('#id').val());
    getClubs();
    getPositions();
});

function getPlayer(id) {
    $.ajax({
        type: "GET",
        url: 'player/get/' + id,
        dataType: 'json',
        success: function (response) {
            var player = response;
            getClub(player.club);
            getPosition(player.position);
            $('#first_name').val(player.first_name);
            $('#last_name').val(player.last_name);
            $('#nationality').val(player.nationality);
            $('#date_of_birth').val(player.date_of_birth);
            $('#height').val(player.height);
            $("input[name=foot][value='"+ player.foot +"']").prop("checked",true);

        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getClub(id) {
    $.ajax({
        type: "GET",
        url: 'club/get/' + parseInt(id),
        dataType: 'json',
        success: function (response) {
            $('#clubs').append("<option selected value='" + id + "'>"+ response.name +"</option>");
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getPosition(id) {
    $.ajax({
        type: "GET",
        url: 'position/get/' + parseInt(id),
        dataType: 'json',
        success: function (response) {
            $('#positions').append("<option selected value='" + id + "'>"+ response.name +"</option>");
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getClubs() {
    $.ajax({
        type: "GET",
        url: 'club/all',
        dataType: 'json',
        success: function (response) {
                var clubs = response;
                for(var i = 0; i < clubs.length; i++) {
                    $('#clubs').append("<option value=" + clubs[i].id + ">" + clubs[i].name + "</option>");
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

                var positions = response;
                for(var i = 0; i < positions.length; i++) {
                    $('#positions').append("<option value=" + positions[i].id + ">" + positions[i].name + "</option>");
                }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function updatePlayer() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var nationality = $('#nationality').val();
    var date_of_birth = $('#date_of_birth').val();
    var height = $('#height').val();
    var foot = $('input[name=foot]:checked').val();
    var club = $('#clubs').val();
    var position = $('#positions').val();
    var id = $('#id').val();

    $.ajax({
        type: "POST",
        url: 'player/edit',
        dataType: 'json',
        data: {
            id: id,
            first_name: first_name,
            last_name: last_name,
            nationality: nationality,
            date_of_birth: date_of_birth,
            height: height,
            foot: foot,
            club: parseInt(club),
            position: parseInt(position)
        },
        success: function (response) {
            window.location.href = 'players.php';
        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}