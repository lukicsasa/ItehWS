$(document).ready(function () {
   getClub($('#id').val());
});


function getClub(id) {
    $.ajax({
        type: "GET",
        url: 'club/get/' + id ,
        dataType: 'json',
        success: function (response) {
            var club = response;
            $('id').val(club.id);
            $('#name').val(club.name);
            $('#country').val(club.country);
            $('#league').val(club.league);
            $('#stadium').val(club.stadium);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function updateClub() {
    var id = $('#id').val();
    var name = $('#name').val();
    var country = $('#country').val();
    var league = $('#league').val();
    var stadium = $('#stadium').val();

    $.ajax({
        type: "PUT",
        url: 'club/edit/' + id + '/' + name + '/' + country + '/' + league + '/' + stadium ,
        dataType: 'json',
        success: function () {
            goToClubs();
        },
        error: function (error) {
            alert("Error: " + JSON.parse(error));
        }
    });
}


function goToClubs() {
    window.location = 'clubs.php';
}