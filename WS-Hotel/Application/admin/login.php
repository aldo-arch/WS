<!DOCTYPE html>
<html lang="en">
<?php
include("../share/header.php");
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) 
{
    header("Location:../room_reserve/reserve.php");
}
?>
<link rel="stylesheet" href="../node_modules/glyphicons-only-bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../public/css/marginForButton.css">
</head>
<body>
    <div class="container">            
        <h1>Hyr</h1>
        <form method="POST" action="login_action.php">
            <?php
			if(isset($_GET['messageError'])) 
			{
				$messageError = $_GET['messageError'];
			?>  
                <div class="marginForButton"></div>
				<div class="alert alert-danger">
                    <?php
					    echo $messageError;
				    ?>
				</div>
			<?php
            }   
                   
			if(isset($_GET['messageSuccess'])) 
			{
				$messageSuccess = $_GET['messageSuccess'];
			?>
                <div class="marginForButton"></div>
			    <div class="alert alert-success">
                    <?php
					    echo $messageSuccess;
					?>
				</div>
			<?php
            } 
            ?>
            <?php
            if(isset($_GET['messageSuccessEmail'])) 
            {
                $messageSuccessEmail = $_GET['messageSuccessEmail'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageSuccessEmail;
                    ?>
                </div>
            <?php
            } 
            ?>
			<div class="input-group">
			    <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                </div>	
				<input type="text" class="form-control" id="username" placeholder="Fut emrin e perdoruesit" name="username"  required>
			</div>
            <div class="marginForButton"></div>
            <div class="input-group">
			    <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                </div>	
                <input type="password" class="form-control" id="password" placeholder="Fut fjalekalimin" name="password"  required>
            </div>
            <div class="marginForButton"></div>
            <div class="form-group">
	            <button type="submit" class="btn btn-primary" name="login" value="login">Hyr</button>
            </div>    
            <div class="form-group">
                <div class="marginForButton"></div>
                Nuk je regjistruar? <button class="btn btn-link btn-primary"><a href="register.php">Regjistrohu</a></button>
                Ke harruar fjalekalimin?<button class="btn btn-link btn-danger"><a href="forgot_password.php">Kliko ketu</a></button>    
            </div> 
        </form>
    <div>
</body>
<?php
include("../share/header.php");  
?>
</html>


