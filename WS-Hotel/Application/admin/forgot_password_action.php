<?php
require_once "../vendor/autoload.php";
include("../share/databaseConnection.php"); 
if(isset($_POST['forgotPassword']))  
{  		  
	$userEmail = $_POST['email'];  
}	
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) 
    {
        $number = rand(0, $alphaLength);
        $password[] = $alphabet[$number];
    }
    return implode($password); //turn the array into a string
}
$newPassword = randomPassword();
$mail = new PHPMailer\PHPMailer\PHPMailer;    
$mail->isSMTP();                                    
$mail->Host = 'smtp.ipage.com';
$mail->SMTPAuth = true;                            
$mail->Username = 'noreply@unnitech.net';               
$mail->Password = '@UnniTech1';                          
$mail->SMTPSecure = 'ssl';                           
$mail->Port = 465;                                  
$mail->From = "noreply@unnitech.net";
$mail->FromName = "Unnitech";
$mail->addAddress($userEmail, "");
$mail->isHTML(true);
$mail->Subject = "Rivendosja e fjalekalimit te llogarise tuaj";
$mail->Body = "<i>Pershendetje , passwordi i ri eshte ".$newPassword."</i>";
$mail->AltBody = "";
$newPassword = md5($newPassword);
$sql = "update user SET password = '$newPassword' WHERE email = '$userEmail'";
$run_query = mysqli_query($database_connection,$sql);  
if(!$mail->send()) 
{
    $messageErrorEmail = ("Mesazhi nuk eshte derguar , shkruani sakte email tuaj");
    header("Location:forgot_password.php?messageErrorEmail={$messageErrorEmail}");
} 
else 
{
    $messageSuccessEmail = ("Mesazhi eshte derguar me sukses ne email tuaj");
    header("Location:login.php?messageSuccessEmail={$messageSuccessEmail}");
}
?>