<?php
header("Access-Control-Allow-Origin");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods:  POST");
header("Access-Control-Allow-Headers: Content-Type: application/json");
header("Access-Control-Allow-Headers: X-Custom-Header, Upgrade-Insecure-Requests");
include_once '../config/config.php';
include_once '../objects/reserve.php'; 
$database = new Database();
$db = $database->getConnection();
$reserve = new Reserve($db);
$fieldsValues=array("id_room","date","date_to");
$dataValues=json_decode(file_get_contents('php://input'), true);
$insert= $reserve->insertData($fieldsValues,$dataValues);
$statement = $db->prepare($insert);
ini_set('display_errors', 1);
$result = $statement->execute();
if($result)
{
    echo json_encode(
        array("message" => "true")
    );
}
else
{
    echo json_encode(
        array("message" => "false")
    );
}
?>
