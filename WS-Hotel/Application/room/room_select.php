<?php
   include("../share/databaseConnection.php");
    include("../share/navbar.php");
    // session_start();// Starting Session
if(isset($_SESSION['login'])) 
{  
?>
    <!-- Custom css files -->
    <link rel="stylesheet" href="../../node_modules/datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../public/css/marginForButton.css">
    </head>
    <body>
        <div class="marginForButton"></div>
        <div class="container">
            <?php
            if(isset($_GET['messageSuccessRoom'])) 
            {
                $messageSuccessRoom = $_GET['messageSuccessRoom'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageSuccessRoom;
                    ?>
                </div>
            <?php
            } 
            if(isset($_GET['messageSuccessRoomUpdate'])) 
            {
                $messageSuccessRoomUpdate = $_GET['messageSuccessRoomUpdate'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageSuccessRoomUpdate;
                    ?>
                </div>
            <?php
            } 
            if(isset($_GET['messageSuccessRoomDelete'])) 
            {
                $messageSuccessRoomDelete = $_GET['messageSuccessRoomDelete'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-danger">
                    <?php
                        echo $messageSuccessRoomDelete;
                    ?>
                </div>
            <?php
            } 
            $sql = "SELECT room_id, number_room, type, price  FROM room";
            $result = $database_connection->query($sql);
            if ($result->num_rows > 0) 
            {
                // output data of each row
            ?>  
                <table id="room" class = "table table-bordered table-secondary">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Numri i dhomes </th>
                            <th>Tipi i dhomes </th>
                            <th>Cmimi i dhomes </th>
                            <th>Ndrysho </th>
                            <th>Fshi </th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc())
                            {  
                        ?>
                                <tr>
                                    <td> <?= $row['room_id']  ?> </td>
                                    <td> <?= $row['number_room'] ?> </td>
                                    <td> <?= $row['type'] ?> </td>
                                    <td> <?= $row['price'] ?> </td>                              
                                    <td> <?= "<a href='room_update.php?room_id=" . $row['room_id'] ."'><button type='button' class='btn btn-warning'> Ndrysho </button></a>" ?> </td> 
                                    <td> <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal">Fshi</button>
                                        <?php
                                            include("modal.php");                    
                                        ?>       
                                    </td>                            
                            </tr>                          
                            <?php
                            }
                            ?>                    
                    </tbody>                  
                </table>
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
                    include("../share/footer.php");
                ?>    
            <a class="btn btn-primary" href="room_insert.php" role="button">Shto dhome</a>
            </button>
        </div>
        <?php           
        $roomId = isset($_GET['room_id']) ? $_GET['room_id'] : '';
        $sql = "SELECT * from room where room_id = ' $roomId '";
        $result = $database_connection->query($sql);
        while($row = $result->fetch_assoc()) 
        {
        ?>
        <div>
            <?php
                if ($roomId != '') 
                { 
            ?>
                    <input type="hidden" name="room_id" id="room_id" value="<?= $roomId; ?>" />
            <?php 
                } 
        } 
        ?>       
    </body>
<?php
}
?>
<!-- Custom Scripts -->
<script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
<script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"> </script>
<script src= "../../public/js/roomDatatable.js"> </script>
<script src= "../../public/js/room_delete.js"> </script>
</html>

                        