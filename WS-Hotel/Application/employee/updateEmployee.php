<?php
include '../share/databaseConnection.php'; 
$employeeId = $_POST['employee_id'];
$employeeName = $_POST['employee_name'];
$job = $_POST['job']; 
$salary= $_POST['salary'];
$sql = "UPDATE employee SET employee_name = '" . $employeeName . "', job= '" . $job . "' , salary= '" . $salary ."' WHERE employee_id = ".$employeeId ;

if ($database_connection->query($sql) === TRUE) 
{
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $$database_connection->error;
} 
header('Location: index.php');
?>
