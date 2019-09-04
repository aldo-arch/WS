<?php
include '../share/databaseConnection.php'; 

if (isset($_POST['emri']) && isset($_POST['puna']) && isset($_POST['paga'])) 
{
  $name = test_input($_POST["emri"]);
  $job = test_input($_POST["puna"]);
  $salary = test_input($_POST["paga"]);
  $sql = "INSERT INTO employee (employee_name, job, salary) VALUES ('$name', '$job', '$salary')";

  if ($database_connection->query($sql) === TRUE) 
  {
      echo "New record created successfully";
      header('Location: index.php');
  } 
  else
  {
      echo "Error: " . $sql . "<br>" . $database_connection->error;
  }
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>







