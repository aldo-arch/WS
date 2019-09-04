<?php
include '../share/databaseConnection.php'; 
include '../share/session.php';
if(isset($_POST['delete']))
{
  $employeeId = $_POST['employee_id'];
  $sql = "DELETE FROM employee WHERE employee_id = ' $employeeId ' ";  
echo $sql;
  if ($database_connection->query($sql) === TRUE) 
  {
      $message = ("Punonjesi u fshi me sukses");
      header("Location:index.php?message={$message}");
  } 
  else 
  {
    echo "Error deleting record: " . $$database_connection->error;
  } 
}
?>

