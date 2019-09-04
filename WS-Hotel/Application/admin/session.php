<?php
session_start();// Starting Session
include("databaseConnection.php");
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from user where username='$user_check'", $database_connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session))
{
    mysql_close($database_connection); // Closing Connection
    header('Location: ../admin/register.php'); // Redirecting To register page
}
?>