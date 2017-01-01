function addClub() {
    var name = $('#name').val();
    var country = $('#country').val();
    var league = $('#league').val();
    var stadium = $('#stadium').val();

    $.ajax({
        type: "POST",
        url: 'club/add',
        data: {
            name: name,
            country: country,
            league: league,
            stadium: stadium
        },
        success: function (response) {
            window.location.href = 'clubs.php';
        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}