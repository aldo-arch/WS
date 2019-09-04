<?php
include '../share/navbar.php';
include '../share/databaseConnection.php';
// session_start();// Starting Session
if(isset($_SESSION['login'])) 
{   
    ?>
    <link rel="stylesheet" href="../../public/css/marginForButton.css">
    <body>
        <div class="container">
            <?php
            if(isset($_GET['messageErrorRoomUpdate'])) 
            {
                $messageErrorRoomUpdate = $_GET['messageErrorRoomUpdate'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-danger">
                    <?php
                        echo $messageErrorRoomUpdate;
                    ?>
                </div>
            <?php
            }   
                $roomId = $_GET['room_id'];
                $sql = "SELECT number_room, type , price from room where room_id = ' $roomId '";
                $result = $database_connection->query($sql);
                while($row = $result->fetch_assoc()) 
                {
            ?>
                    <form action="room_update_action.php" method="post">
                            <?php
                                if ($roomId != '') 
                                { 
                            ?>
                                    <input type="hidden" name="room_id" id="room_id" value="<?= $roomId; ?>" />
                            <?php 
                                } 
                            ?>
                        
                        <div class="marginForButton"></div>
                        <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                            <input type="number" class="form-control" name="numberRoom"  id="numberRoom" placeholder="Vendos numrin e dhomes" value="<?=$row['number_room']; ?>"/>
                        </div>
                        <div class="marginForButton"></div>
                        <div class="form-group">
                            <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                            <select class="form-control" name="type" id="type" value="<?=$row['type']; ?>"/>
                                <option id="type">Cift</option>
                                <option id="type">Tek</option>
                            </select>
                        </div>
                        <div class="marginForButton"></div>
                        <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-money"></i></div>
                        </div>
                            <input type="number" class="form-control"  name="price"  id="price" placeholder="Vendos cmimin e dhomes ne dollar" value="<?=$row['price']; ?>"/>
                        </div> 
                        <div class="marginForButton"></div>          
                        <button type="submit" class="btn btn-primary" name="update">Edito</button>
                    </form>
                <?php 
                }
                ?> 
        </div>
    </body>
    <?php
}?>
</html>
