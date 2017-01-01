<?php
require_once 'clubClass.php';
require_once 'playerClass.php';
require_once 'positionClass.php';


class Controller {

    static function  deletePlayer($id) {
        $player = Player::getById($id);
        $player->deletePlayer();
    }

    static function  deleteClub($id) {
        $club = Club::getById($id);
        $club->deleteClub();
    }

    static function  deletePosition($id) {
        $position = Position::getById($id);
        $position->deletePosition();
    }

    static function getLastPlayer() {
        $player = Player::getLast();
        return $player;
    }

    static function getLastClub() {
        $club = Club::getLast();
        return $club;
    }

    static function getPositions() {
        $positions = Position::getAll();
        return $positions;
    }

    static function getPositionById($id) {
        $position = Position::getById($id);
        return $position;
    }

    static function getClubById($id) {
        $club = Club::getById($id);
        return $club;
    }

    static function getClubs() {
        $clubs = Club::getAll();
        return $clubs;
    }

    static function getPlayers() {
        $players = Player::getAll();
        return $players;
    }

    static function getPlayerById($id) {
        $players = Player::getById($id);
        return $players;
    }

    static function addPosition($name) {
        $position = new Position($name);
        $result = $position->addNew();
        return $result;
    }

    static function addClub($name, $country, $league, $stadium) {
        $club = new Club($name,$country, $league, $stadium);
        $result = $club->addNew();
        return $result;
    }

    static function  addPlayer($data) {
        $player = new Player($data->first_name,$data->last_name,$data->date_of_birth, $data->nationality, $data->height, $data->foot, $data->position, $data->club);
        $result = $player->addNew();
        return $result;
    }

    static function editPlayer($data) {
        $player = Player::getById($data->id);
        $player->first_name = $data->first_name;
        $player->last_name = $data->last_name;
        $player->nationality = $data->nationality;
        $player->date_of_birth = $data->date_of_birth;
        $player->foot = $data->foot;
        $player->height = $data->height;
        $player->club = $data->club;
        $player->position = $data->position;
        $result = $player->editPlayer();
        return $result;
    }

    static function editClub($id,$name,$country,$league,$stadium) {
        $club = Club::getById($id);
        $club->name  = $name;
        $club->country  = $country;
        $club->league  = $league;
        $club->stadium  = $stadium;
        $result = $club->editClub();
        return $result;
    }

}
