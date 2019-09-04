<?php
include("../share/databaseConnection.php");
if(isset($_POST['insert'])) 
{
  $numberRoom = $_POST['numberRoom'];
	$type = $_POST['type'];  
  $price = $_POST['price'];
  $checkRoomQuery = "select * from room WHERE number_room = '$numberRoom'";  
	$runQuery = mysqli_query($database_connection,$checkRoomQuery);  
	if(mysqli_num_rows($runQuery) > 0)  
	{ 
    $messageSuccessRoom = ("Nje dhome me kete numer ekziston , Vendosni nje numer tjeter , nuk mund te jene dy dhoma me te njejtin numer !"); 
    header("Location:room_select.php?messageSuccessRoom={$messageSuccessRoom}");
    return;
  }  
  $sql = "insert into room (number_room,type,price) VALUE ('$numberRoom','$type','$price')";
  if ($database_connection->query($sql) === TRUE) 
  {
    $messageSuccessRoom = ("Dhoma u shtua me sukses");
		header("Location:room_select.php?messageSuccessRoom={$messageSuccessRoom}");
  } 
  else
  {
    $messageErrorRoom = ("Dhoma nuk u shtua !"); 
		header("Location:room_insert.php?messageErrorRoom={$messageErrorRoom}");
  }
}
?>