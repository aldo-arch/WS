<?php
include '../share/databaseConnection.php';
include('../share/session.php');
$userId = $_GET['user_id'];
$sql = "DELETE FROM user WHERE user_id = ' $userId ' ";  
if ($database_connection->query($sql) === TRUE) 
{
    $messageSuccessUserDelete = ("Perdoruesi u fshi me sukses");
    header("Location:user_select.php?messageSuccessUserDelete={$messageSuccessUserDelete}");
} 
else 
{
  echo "Error deleting record: " . $database_connection->error;
}
