<!DOCTYPE html>
<html lang="en">
<?php
include("../share/navbar.php");
//session_start();// Starting Session
if(isset($_SESSION['login'])) 
{    
?>
    <link href="../../node_modules/bootstrap/dist/js/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="user_insert_action.php">
                <?php
                if(isset($_GET['messageErrorUser'])) 
                {
                    $messageErrorUser = $_GET['messageErrorUser'];
                ?>
                    <div class="marginForButton"></div>
                    <div class="alert alert-danger">
                        <?php
                            echo $messageErrorUser;
                        ?>
                    </div>
                <?php
                } 
                ?>
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
                ?>
                <div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-user"></i></div>
				</div>
                    <input  class= "form-control"type="text" name="username" placeholder="Username" required>
                </div>
                <div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-lock"></i></div>
				</div>
                    <input  class= "form-control"type="password" name="password" placeholder="Password" required> 
                </div>
                <div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-at"></i></div>
				</div>
                    <input  class= "form-control"type="email" name="email" placeholder="Email" required> 
                </div>
                <div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-user"></i></div>
				</div>
                    <input  class= "form-control"type="text" name="name" placeholder="Emri" required> 
                </div>
                <div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-phone"></i></div>
				</div>
                    <input  class= "form-control"type="number" name="celular" placeholder="Celular" required> 
                </div>
                <div class="form-group">
                <div class="marginForButton"></div>
                    <label>Zgjidh rolin</label>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-user-secret"></i></div>
				</div>
                    <select class="form-control" name="role" id="role">
                        <option id="role">User</option>
                        <option id="role">Admin</option>
                    </select>
                </div></div>
                <button type="submit" class="btn btn-primary" name="insert" value="insert">Shto</button>
            </form>
        </div>
    </body>
<?php
} 
?>
</html>



