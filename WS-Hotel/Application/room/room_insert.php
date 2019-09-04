<!DOCTYPE html>
<html lang="en">
<?php
include("../share/navbar.php");
// session_start();// Starting Session
if(isset($_SESSION['login'])) 
{  
?>
    <link href="../../node_modules/bootstrap/dist/js/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/marginForButton.css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="room_insert_action.php">
                <?php
                if(isset($_GET['messageErrorRoom'])) 
                {
                    $messageErrorRoom = $_GET['messageErrorRoom'];
                ?>
                    <div class="marginForButton"></div>
                    <div class="alert alert-danger">
                        <?php
                            echo $messageErrorRoom;
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
                    <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                </div>
                    <input  class= "form-control"type="number" name="numberRoom" placeholder="Numri i dhomes" required>
                </div>
                <div class="marginForButton"></div>
                <div class="form-group">
                    <label>Zgjidh Tipin</label>
                    <div class="input-group">
			    <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                </div>
                    <select class="form-control" name="type" id="type">
                        <option id="type">Cift</option>
                        <option id="type">Tek</option>
                    </select>
                </div>
                <div class="marginForButton"></div>
                <div class="input-group">
			    <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-money"></i></div>
                </div>	
                    <input  class= "form-control" type="number" name="price" placeholder="Cmimi ne dollar" required>
                </div>
                <div class="marginForButton"></div>
                <button type="submit" class="btn btn-primary" name="insert" value="insert">Shto</button>
            </form>
        </div>
    </body>
<?php 
} 
?>
</html>



