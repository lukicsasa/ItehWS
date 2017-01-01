<?php

include_once('response.php');

 class Position
 {
     public $id;
     public $name;

     public function __construct ($name) {
        $this->name = $name;
     }

     public static function getAll() {
         include_once ('mysql_connection.php');
         global $mysqli;
         $sql = "SELECT * FROM position";

         if(!$result = $mysqli->query($sql)) {
             echo "ERROR" . $mysqli->mysql_error;
             exit();
         }

         $arrayResult = array();
         while($row = $result->fetch_object()) {
             $position = new Position($row->name);
             $position->id = $row->id;
             array_push($arrayResult, $position);
         }
         return $arrayResult;
     }

     public static function getById($id) {
         include_once ('mysql_connection.php');
         global $mysqli;
         $sql = "SELECT * FROM POSITION WHERE id = $id";

         if(!$result = $mysqli->query($sql)) {
             echo "ERROR " . $mysqli->error;
             exit();
         }

         $position = null;
         while($row = $result->fetch_object()) {
             $position = new Position($row->name);
             $position->id = $row->id;
         }
         return $position;
     }

     public function addNew()
     {
         include_once('mysql_connection.php');
         global $mysqli;
         $query = "INSERT INTO position (name) VALUES ('"
             . $mysqli->real_escape_string($this->name) ."')";

         if ($mysqli->query($query)) {
             return true;
         }
         else {
             return false;
         }
     }

     public function deletePosition()
     {
         include_once('mysql_connection.php');
         global $mysqli;
         $query = "DELETE FROM POSITION WHERE id=" . $this->id;
         if ($mysqli->query($query)) {
             echo json_encode(new Response(1,"Position deleted."));
             return true;
         }
         else {
             echo json_encode(new Response(0,"Position is currently being used."));
             return false;
         }
     }
 }
