<!DOCTYPE html>
<html lang="en">
<?php
include("../share/header.php");  
?>
</head>
<body>
    <div class="container">
        <form method="POST" action="forgot_password_action.php">
            <?php
		    if(isset($_GET['messageErrorEmail'])) 
		    {
			    $messageErrorEmail = $_GET['messageErrorEmail'];
		    ?>
			    <div class="alert alert-danger">
                    <?php
				        echo $messageErrorEmail;
			        ?>
			    </div>
		    <?php
            }  
            ?>
            <div class="form-group">
                <h2>Vendosja e fjalekalimit te ri</h2>
            </div>
			<div class="input-group">
			<div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                </div>	
                <input type="email" class="form-control" id="email" placeholder="Fut email" name="email" required>
            </div>
            <div class="marginForButton"></div>
            <div class="input-group">
                <button type="submit" class="btn btn-primary" name="forgotPassword" value="forgotPassword">Merr fjalekalimin e ri</button>
            </div>     
        </form>
    </div>    
</body>
<?php
include("../share/header.php");  
?>
</html>
