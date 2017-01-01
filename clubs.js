$(document).ready(function () {
    getClubs();

    $("#clubs-table").tablesorter();

});

function deleteClub(id) {
    $.ajax({
        type: "DELETE",
        url: 'club/delete/' + id ,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            alert("Error deleting clubs: " + error.status);
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
                $('#clubs').append('<h2><strong>Currently, there are no clubs.</strong></h2>');
                $('#clubs-table').hide();
            }
            else {
                var clubs = response;
                for(var i = 0; i < clubs.length; i++) {
                    $('#clubs').append("<tr><td>" + clubs[i].id + "</td><td>" + clubs[i].name + "</td><td>" + clubs[i].stadium + "</td><td>" + clubs[i].country + "</td><td>" + clubs[i].league + "</td><td><button id='edit-button' name='edit-button' onclick='editClub(" + clubs[i].id + ")' class='btn btn-primary btn-sm'>Edit</button><button id='delete-button' onclick='deleteClub(" + clubs[i].id +")' class='btn btn-danger btn-sm'>Delete</button></td>");
                }
            }


        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}


function editClub(id) {
    window.location.href = 'editClub.php?id=' + id;
}