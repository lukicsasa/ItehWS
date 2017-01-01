<?php
require 'flight/Flight.php';
require 'controller.php';

Flight::route('/', function () {
    Flight::render('../home.php');
});

//player
Flight::route('DELETE /player/delete/@id', function ($id) {
    Controller::deletePlayer($id);
});

Flight::route('GET /player/last', function () {
    echo json_encode(Controller::getLastPlayer());
});

Flight::route('GET /player/get/@id', function ($id) {
    echo json_encode(Controller::getPlayerById($id));
});

Flight::route('GET /player/all', function () {
    echo json_encode(Controller::getPlayers());
});

Flight::route('POST /player/add', function () {
    echo json_encode(Controller::addPlayer(Flight::request()->data));
});

Flight::route('POST /player/edit', function () {
    echo json_encode(Controller::editPlayer(Flight::request()->data));
});

//club
Flight::route('DELETE /club/delete/@id', function ($id) {
    Controller::deleteClub($id);
});

Flight::route('GET /club/last', function () {
    echo json_encode(Controller::getLastClub());
});

Flight::route('GET /club/all', function () {
    echo json_encode(Controller::getClubs());
});

Flight::route('GET /club/get/@id', function ($id) {
    echo json_encode(Controller::getClubById($id));
});

Flight::route('POST /club/add', function () {
    $data = Flight::request()->data;
    echo json_encode(Controller::addClub($data->name, $data->country, $data->league, $data->stadium));
});

Flight::route('PUT /club/edit/@id/@name/@country/@league/@stadium', function ($id,$name,$country,$league,$stadium) {
    echo json_encode(Controller::editClub($id,$name,$country,$league,$stadium));
});

//position
Flight::route('DELETE /position/delete/@id', function ($id) {
    Controller::deletePosition($id);
});

Flight::route('GET /position/all', function () {
    echo json_encode(Controller::getPositions());
});

Flight::route('GET /position/get/@id', function ($id) {
    echo json_encode(Controller::getPositionById($id));
});

Flight::route('POST /position/add', function () {
    echo json_encode(Controller::addPosition(Flight::request()->data->name));
});


Flight::start();