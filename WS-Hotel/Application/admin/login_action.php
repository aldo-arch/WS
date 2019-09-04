<?php
session_start(); // Starting Session
include("../share/databaseConnection.php");
if(isset($_POST['login']))
{
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $userPassword = md5($_POST['password']);
    $sql = "select * from user WHERE username='$username' AND password='$userPassword'";
    $runQuery = mysqli_query($database_connection,$sql); 
    $userId = $row['user_id']; 
	if(mysqli_num_rows($runQuery) > 0) 
    { 
        $_SESSION['login'] = $username;
        $_SESSION['userId'] = $userId;
        $messageSuccess = ("U loguat me sukses");
        header("Location:../share/navbar.php");
    }
    else
    {
        $messageError = ("Username ose fjalekalimi juaj nuk eshte i sakte!"); 
		header("Location:login.php?messageError={$messageError}");
    } 
}
mysql_close($database_connection); // Closing Connection
?>
