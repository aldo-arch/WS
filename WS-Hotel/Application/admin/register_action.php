<?php  
	include("../share/databaseConnection.php");
	if(isset($_POST['register']))  
	{  	
		$username = $_POST['username'];
		$userPass = md5($_POST['password']);  
		$userEmail = $_POST['email'];  
		$userName = $_POST['name'];  
		$userPhoneNumber = $_POST['phoneNumber']; 
		$checkUsernameQuery = "select * from user WHERE username = '$username'";  
		$runQuery = mysqli_query($database_connection,$checkUsernameQuery);  
		if(mysqli_num_rows($runQuery) > 0)  
		{ 
			$messageError = ("Ky emer perdoruesi ekziston ne databazen tone .Provoni nje tjeter"); 
			header("Location:register.php?messageError={$messageError}");
			return;
		} 
		$insertUser = "insert into user (username,password,name,email,celular) VALUE ('$username','$userPass','$userName','$userEmail','$userPhoneNumber')";  
		if(mysqli_query($database_connection,$insertUser))  
		{  	
			$messageSuccess = ("U regjistruat me sukses");
			header("Location:login.php?messageSuccess={$messageSuccess}");	
		} 	
	} 
?>  
