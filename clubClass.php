<?php
include_once('response.php');

class Club
{
    public $id;
    public $name;
    public $country;
    public $league;
    public $stadium;

    public function __construct($name, $country, $league, $stadium)
    {
        $this->name = $name;
        $this->country = $country;
        $this->league = $league;
        $this->stadium = $stadium;
    }

    public static function getAll()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM club";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while ($row = $result->fetch_object()) {
            $club = new Club($row->name, $row->country, $row->league, $row->stadium);
            $club->id = $row->id;
            array_push($arrayResult, $club);
        }
        return $arrayResult;
    }

    public static function getLast()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM club ORDER BY id DESC LIMIT 1";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $club = null;
        while ($row = $result->fetch_object()) {
            $club = new Club($row->name, $row->country, $row->league, $row->stadium);
            $club->id = $row->id;
        }
        return $club;
    }

    public static function getById($id)
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM club WHERE id=" .$id . ";";
        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $club = null;
        while ($row = $result->fetch_object()) {
            $club = new Club($row->name, $row->country, $row->league, $row->stadium);
            $club->id = $row->id;
        }
        return $club;
    }

    public function addNew()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "INSERT INTO club (name, country, league, stadium) VALUES ('"
            . $mysqli->real_escape_string($this->name) . "', '"
            . $mysqli->real_escape_string($this->country) . "', '"
            . $mysqli->real_escape_string($this->league) . "', '"
            . $mysqli->real_escape_string($this->stadium) . "')";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function editClub()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "UPDATE club SET NAME = '" . $this->name . "', COUNTRY = '" . $this->country . "', LEAGUE = '" . $this->league . "', STADIUM = '" . $this->stadium . "' WHERE id = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteClub()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "DELETE FROM club WHERE id = $this->id";
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1, "Club deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Club is currently being used."));
            return false;
        }
    }
}

