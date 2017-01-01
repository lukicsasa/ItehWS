$(document).ready(function () {
    getPositions();
    $("#positions-table").tablesorter();

});


function getPositions() {
    $.ajax({
        type: "GET",
        url: 'position/all',
        dataType: 'json',
        success: function (response) {
            if(response == null) {
                $('#positions').append('Currently, there are no positons.');
                $('#positions-table').hide();
            }
            else {
                var positions = response;
                for(var i = 0; i < positions.length; i++) {
                    $('#positions').append("<tr><td id='id'>" + positions[i].id + "</td><td>" + positions[i].name + "</td><td><button id='delete-button' onclick='deletePosition("+ positions[i].id + ")' class='btn btn-sm btn-danger'>Delete</button></td></tr>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function addPosition() {
    var name = $('#name').val();
    $.ajax({
        type: "POST",
        url: 'position/add',
        data: {
            name: name
        },
        success: function () {
            location.reload();
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function deletePosition(id) {
    $.ajax({
        type: "DELETE",
        dataType: "json",
        url: 'position/delete/' + id ,
        success: function (response) {
                location.reload();
        },
        error: function (error) {
            alert("Error deleting position: " + error.status);
        }
    });
}