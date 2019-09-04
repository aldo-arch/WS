<?php
include '../share/databaseConnection.php';
$roomId = $_GET['room_id'];
$sql = "DELETE FROM room WHERE room_id = ' $roomId ' ";  
if ($database_connection->query($sql) === TRUE) 
{
    $messageSuccessRoomDelete = ("Dhoma u fshi me sukses");
    header("Location:room_select.php?messageSuccessRoomDelete={$messageSuccessRoomDelete}");
} 
else 
{
  echo "Error deleting record: " . $database_connection->error;
}
