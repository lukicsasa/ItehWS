$(document).ready(function () {
    getLastPlayer();
    getLastClub();
    getPositions();
    getTeams();
});

function getTeams() {
    $.ajax({
        type: "GET",
        url: 'http://api.football-data.org/v1/competitions/398/teams',
        dataType: 'json',
        beforeSend: function(request) {
            request.setRequestHeader("X-Auth-Token", 'abfa1886e40a460baf9364b0b338ce41');
        },
        success: function (response) {
            var teams = response.teams;
            for(var i = 0; i < teams.length; i++) {
                var team = teams[i];
                $('#teams').append('<tr class="teams-cell"><td>'+ team.name +'</td><td>'+ team.shortName +'</td><td>'+ team.squadMarketValue +'</td><td><img width="100" height="100" src="'+ team.crestUrl +'"></td></tr>');
            }
        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}


function getLastPlayer() {
    $.ajax({
        type: "GET",
        url: 'player/last',
        success: function (response) {
            if(response == null || response == "null") {
                $('#lastPlayer').append('Currently, there are no players.');
            }else {
                var player = JSON.parse(response);
                var position = getPosition(player.position);
                var club = getClub(player.club);
                $('#lastPlayer').append(
                    "First Name: <strong>" + player.first_name
                    + "</strong><br/>Last Name: <strong>" + player.last_name
                    + "</strong><br/>Date Of Birth: <strong>" + player.date_of_birth
                    + "</strong><br/>Nationality: <strong>" + player.nationality
                    + "</strong><br/>Height: <strong>" + player.height
                    + "</strong><br/>Foot: <strong>" + player.foot
                    + "</strong><br/>Club: <strong>" + "<span id='lastPlayerClub'></span>"
                    + "</strong><br/>Position: <strong>" + "<span id='lastPlayerPosition'></span>" +  "</strong>"
                );
            }

        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getLastClub() {
    $.ajax({
        type: "GET",
        url: 'club/last',
        dataType: 'json',
        success: function (response) {
            if(response == null) {
                $('#lastClub').append('Currently, there are no clubs.');
            }else {
                var club = response;
                $('#lastClub').append(
                    "Name: <strong>" + club.name
                    + "</strong><br/>Country: <strong>" + club.country
                    + "</strong><br/>League: <strong>" + club.league
                    + "</strong><br/>Stadium: <strong>" + club.stadium + "</strong>"
                );
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getPosition(id) {
     $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'position/get/' + id,
        success: function (response) {
            $('#lastPlayerPosition').append(response.name);
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
        url: 'club/get/' + id,
        success: function (response) {
            $('#lastPlayerClub').append(response.name);
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
            if(response == null) {
                $('#positions').append('Currently, there are no positons.');
            }
            else {
                var positions = response;
                for(var i = 0; i < positions.length; i++) {
                    $('#positions').append("<strong>" +   positions[i].id + "</strong>  <strong>" + positions[i].name + "</strong><br/>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}
