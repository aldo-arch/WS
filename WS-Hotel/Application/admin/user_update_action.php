<?php
    include("../share/databaseConnection.php");
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $celular = $_POST['celular'];
    $role = $_POST['role'];
    $sql = "UPDATE user SET username = '" . $username . "', email= '" . $email ."' , name= '" . $name ."' , celular= '" . $celular ."' , role= '" . $role ."' WHERE user_id = ".$userId ;
    if ($database_connection->query($sql) === TRUE) 
    {
        $messageSuccessUserUpdate = ("Perdoruesi u ndryshua me sukses");
        header("Location:user_select.php?messageSuccessUserUpdate={$messageSuccessUserUpdate}");
    }
    else 
    {
        $messageSuccessUserDelete = ("Dicka shkoi gabim , useri nuk u ndryshua!"); 
		header("Location:user_select.php?messageSuccessUserDelete={$messageSuccessUserDelete}");
    } 
?>