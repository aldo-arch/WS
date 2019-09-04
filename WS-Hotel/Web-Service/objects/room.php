<?php
class Room
{
    private $conn;
    private $tableName = "room";
    public $roomId;
    public $numberRoom;
    public $type;
    public $price;
    public function __construct($db){
    $this->conn = $db;
}
    function read()
    {
        $query = "SELECT room_id ,number_room, type, price FROM $this->tableName ";
        // prepare query statement
        $statement = $this->conn->prepare($query);
        // execute query
        $statement->execute();
        return $statement;
    }

    function readOne($data)
    {
        // query to read single record
        $query = "SELECT number_room, type, price FROM $this->tableName  WHERE  room_id = ".$data." ";             
        // prepare query statement
        $statement = $this->conn->prepare($query); 
        $statement->bindParam(1, $this->roomId);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->numberRoom = $row['number_room'];
        $this->type = $row['type'];
        $this->price = $row['price'];
    }
}