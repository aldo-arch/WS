<?php
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: X-Custom-Header, Upgrade-Insecure-Requests");
include_once '../config/config.php';
include_once '../objects/room.php';
$database = new Database();
$db = $database->getConnection(); 
$room = new Room($db);
$statement = $room->read();
$numberRow = $statement->rowCount();
if($numberRow > 0)
{
    $roomArr=array();
    $roomArr["records"]=array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $room_item=array(
            "room_id" => $room_id,
            "number_room" => $number_room,
            "type" => $type,
            "price" => $price
        );
        array_push($roomArr["records"], $room_item);
    }
    echo json_encode($roomArr);
}
else{
    echo json_encode(
        array("message" => "false")
    );
}
?>