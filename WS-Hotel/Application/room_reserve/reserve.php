<?php
    include("../share/databaseConnection.php"); 
    include("../share/navbar.php");
?>
<?php      
$sql = "SELECT room_id, number_room, type, price FROM room";
$result = $database_connection->query($sql);?>
</head>
</body>
<div class="marginForButton"></div>
<?php
if ($result->num_rows > 0) 
{ ?>
    <body>
    <div class="container">
    <?php
        if(isset($_GET['messageSuccessReserve'])) 
        {
            $messageSuccessReserve = $_GET['messageSuccessReserve'];
        ?>
            <div class="marginForButton"></div>
            <div class="alert alert-success">
                <?php
                    echo $messageSuccessReserve;
                ?>
            </div>
        <?php
        } 
        if(isset($_GET['messageErrorReserve'])) 
        {
            $messageErrorReserve = $_GET['messageErrorReserve'];
        ?>
            <div class="marginForButton"></div>
            <div class="alert alert-danger">
                <?php
                    echo $messageErrorReserve;
                ?>
            </div>
        <?php
        }   
            ?>
        <div class="row">
            <?php
            while($row = $result->fetch_assoc())
            {?>  
                <div class="col-sm-4" style="background-color:lavender;">
                    <form action="book.php" method="GET">
                        <div class="card">
                            <div class="card-header">    
                            </div>
                            <div class="card-body">
                                <img class="card-img-top" src="../../public/images/room.jpg" alt="Card image cap">
                                <h5 class="card-title">Detaje</h5>
                                <div class="form-group">
                                    <input id="roomId" name="roomId" type="hidden" value="<?= $row['room_id']  ?>">
                                    <p class="card-text">Numri i dhomes: <?= $row['number_room']  ?></p>
                                </div>
                                    <p class="card-text">Tipi i dhomes: <?= $row['type']  ?></p>
                                    <p class="card-text">Cmimi i dhomes ne dollar: <?= $row['price']  ?></p>
                                <button type="submit" class="btn btn-primary" name="reserve">Rezervo</button>
                            </div>
                        </div>   
                    </form>
                </div> 
            <?php 
            }?>
        </div>
    </div>
<?php
}      
else 
{
?>
    <div class="alert alert-info">
        Asnje rezultat
    </div>
<?php
}
?>
</body>
</html>   