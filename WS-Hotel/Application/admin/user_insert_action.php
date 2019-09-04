<?php
include("../share/databaseConnection.php");
if(isset($_POST['insert'])) 
{
  $username = $_POST['username'];
	$userPassword = md5($_POST['password']);  
	$userEmail = $_POST['email'];  
	$userName = $_POST['name'];  
  $userPhoneNumber = $_POST['celular'];
  $userRole = $_POST['role'];
  $checkUsernameQuery = "select * from user WHERE username = '$username'";  
	$runQuery = mysqli_query($database_connection,$checkUsernameQuery);  
	if(mysqli_num_rows($runQuery) > 0)  
	{ 
    $messageSuccessUserDelete = ("Ky emer perdoruesi ekziston ne databazen tone .Provoni nje tjeter"); 
    header("Location:user_select.php?messageSuccessUserDelete={$messageSuccessUserDelete}");
    return;
  }  
  $sql = "insert into user (username,password,email,name,celular,role) VALUE ('$username','$userPassword','$userEmail','$userName','$userPhoneNumber','$userRole')";
  if ($database_connection->query($sql) === TRUE) 
  {
    $messageSuccessUser = ("Perdoruesi u shtua me sukses");
		header("Location:user_select.php?messageSuccessUser={$messageSuccessUser}");
  } 
  else
  {
    $messageErrorUser = ("Perdoruesi nuk u shtua !"); 
		header("Location:user_insert.php?messageError={$messageErrorUser}");
  }
}
?>