<?php
    include("../share/databaseConnection.php");
    $roomId = $_POST['room_id'];
    $numberRoom = $_POST['numberRoom'];
    $type = $_POST['type']; 
    $price= $_POST['price'];
    $sql = "UPDATE room SET number_room = '" . $numberRoom . "', type= '" . $type . "' , price= '" . $price ."' WHERE room_id = ".$roomId ;
    if ($database_connection->query($sql) === TRUE) 
    {
        $messageSuccessRoomUpdate = ("Dhoma u ndryshua me sukses");
        header("Location:room_select.php?messageSuccessRoomUpdate={$messageSuccessRoomUpdate}");
    }
    else 
    {
        $messageSuccessRoomDelete = ("Dicka shkoi gabim , dhoma nuk u ndryshua!"); 
		header("Location:room_select.php?messageSuccessRoomDelete={$messageSuccessRoomDelete}");
    } 
?>