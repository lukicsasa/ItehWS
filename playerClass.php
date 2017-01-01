<?php
include_once('response.php');

class Player 
{
    public $id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $nationality;
    public $height;
    public $foot;
    public $position;
    public $club;

     public function __construct($first_name, $last_name,$date_of_birth,$nationality,$height,$foot,$position,$club)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->nationality = $nationality;
        $this->height = $height;
        $this->foot = $foot;
        $this->position = $position;
        $this->club = $club;
    }

    public static function getAll() {
        include_once ('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM player";
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $player = new Player($row->first_name, $row->last_name,$row->date_of_birth,$row->nationality,$row->height,$row->foot,$row->position_id,$row->club_id);
            $player->id = $row->id;
            array_push($arrayResult, $player);
        }
        return $arrayResult;
    }

     public static function getLast() {
        include_once ('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM player ORDER BY id DESC LIMIT 1";

        if(!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }
        
        $player = null;
        while($row = $result->fetch_object()) {
            $player = new Player($row->first_name, $row->last_name,$row->date_of_birth,$row->nationality,$row->height,$row->foot,$row->position_id,$row->club_id);
            $player->id = $row->id;
        }
        return $player;
    }

    public static function getById($id) {
        include_once ('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM player WHERE id=" . $id;

        if(!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $player = null;
        while($row = $result->fetch_object()) {
            $player = new Player($row->first_name, $row->last_name,$row->date_of_birth,$row->nationality,$row->height,$row->foot,$row->position_id,$row->club_id);
            $player->id = $row->id;
        }
        return $player;
    }

    public function addNew()
    {
        include_once('mysql_connection.php');
        global $mysqli;

        $query = "INSERT INTO player (first_name, last_name, date_of_birth, nationality, height, foot, position_id, club_id) VALUES ('"
            . $mysqli->real_escape_string($this->first_name) . "', '" 
            . $mysqli->real_escape_string($this->last_name) . "', '"
            . $mysqli->real_escape_string(date('Y-m-d', strtotime($this->date_of_birth))) . "', '"
            . $mysqli->real_escape_string($this->nationality) . "', '"
            . $mysqli->real_escape_string($this->height) . "', '"
            . $mysqli->real_escape_string($this->foot) . "', '" 
            . $mysqli->real_escape_string($this->position) . "', '" 
            . $mysqli->real_escape_string($this->club) ."')";

        if ($mysqli->query($query)) {
            return true;
        }
            else {
                echo $mysqli->error;
                return false;
        }
    }

    public function editPlayer()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "UPDATE PLAYER SET FIRST_NAME = '" . $this->first_name
            . "', LAST_NAME = '" . $this->last_name
            . "', NATIONALITY = '" . $this->nationality
            . "', DATE_OF_BIRTH = '" . $this->date_of_birth
            . "', FOOT = '" . $this->foot
            . "', HEIGHT = '" . $this->height
            . "', CLUB_ID = '" . $this->club
            . "', POSITION_ID = '" . $this->position
            . "' WHERE id = $this->id";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }


    public function deletePlayer()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "DELETE FROM player WHERE id =" . $this->id;
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1,"Player deleted."));
            return true;
        }
        else {
            echo json_encode(new Response(0,"Error deleting player."));
            return false;
        }
    }
}

?>