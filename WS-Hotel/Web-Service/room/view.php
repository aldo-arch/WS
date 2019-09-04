<?php
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-Custom-Header, Upgrade-Insecure-Requests");
include_once '../config/config.php';
include_once '../objects/room.php'; 
$database = new Database();
$db = $database->getConnection();
$room = new Room($db);
$data = $_GET['room_id'];
$statement = $room->readOne($data);
$roomArr = array(
    "number_room" => $room->numberRoom,
    "type" => $room->type,
    "price" => $room->price,
);
print_r(json_encode($roomArr));   
?>