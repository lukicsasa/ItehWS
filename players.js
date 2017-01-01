$(document).ready(function () {
    getPlayers();
    $("#players-table").tablesorter();

});

function deletePlayer(id) {
    $.ajax({
        type: "DELETE",
        url: 'player/delete/' + id ,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getPlayers() {
    $.ajax({
        type: "GET",
        url: 'player/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#players').append('<h2><strong>Currently, there are no players.</strong></h2>');
                $('#players-table').hide();
            }
            else {
                var players = response;
                for(var i = 0; i < players.length; i++) {
                    $('#players').append("<tr><td>" + players[i].id + "</td><td>" + players[i].first_name + "</td><td>" + players[i].last_name + "</td><td>" + players[i].date_of_birth + "</td><td>" + players[i].nationality + "</td><td>"+ players[i].height + "</td><td>"+ players[i].foot + "</td><td><button id='edit-button' name='edit-button' onclick='editPlayer(" + players[i].id + ")' class='btn btn-primary btn-sm'>Edit</button><button id='delete-button' onclick='deletePlayer(" + players[i].id +")' class='btn btn-danger btn-sm'>Delete</button></td>");
                }
            }


        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}

function goToClubs() {
    window.location = 'http://localhost/iteh/clubs.php';
}

function editPlayer(id) {
    window.location.href = 'editPlayer.php?id=' + id;

}

function getPosition(id) {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'position/' + id,
        success: function (response) {
            $('#playerPosition').append(response.name);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getClub(id) {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'club/' + id,
        success: function (response) {
            $('#playerClub').append(response.name);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}