<?php
include '../../config/config.php'; 
$database_connection = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);
if ($database_connection->connect_error) {
    die("Connection failed: " . $database_connection->connect_error);
} 
echo "";
?>
