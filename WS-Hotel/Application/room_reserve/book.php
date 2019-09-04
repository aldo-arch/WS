<?php
include("../share/databaseConnection.php");
include("../share/navbar.php");   
?>
<link rel="stylesheet" href="../../node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="../../public/css/marginForButton.css">
</head>
<?php
if(isset($_GET['reserve']))
{
    $roomId = $_GET['roomId'];
    $sql = "select number_room, type, price FROM room WHERE room_id = ' $roomId ' ";
    $runQuery = mysqli_query($database_connection,$sql);
    while($row = $runQuery->fetch_assoc()) 
    {  
    ?>
    <body>
    <div class="container">
        <?php
        if(isset($_GET['messageErrorReserve'])) 
            {
                $messageErrorReserve = $_GET['messageErrorReserve'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageErrorReserve;
                    ?>
                </div>
            <?php
            } 
            ?>
        <form action="book_action.php">
            <div class="card">
                <div class="card-header"> 
                    <div class="form-group">
                        <input id="roomId" name="roomId" type="hidden" value="<?= $roomId  ?>">
                    </div>                     
                </div>
                <div class="card-body">
                    <img class="card-img-top" src="../../public/images/room.jpg" alt="Card image cap">
                    <div class="marginForButton"></div>
                    <h5 class="card-title">Detaje</h5>
                    <p class="card-text">Numri i dhomes: <?=$row['number_room']  ?></p>
                    <p class="card-text">Tipi i dhomes: <?=$row['type']  ?></p>
                    <p class="card-text">Cmimi i dhomes ne dollar: <?=$row['price']  ?></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Data e fillimit te rezervimit</h6>
                            <div class="input-group">
                                <input type="text" id="from" name="calendar1" data-date-format="yyyy-mm-dd"/>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">    
                            <h6>Data e perfundimit te rezervimit</h6>
                            <div class="input-group">
                                <input type="text" id="to" name="calendar2" data-date-format="yyyy-mm-dd"/>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="marginForButton"></div>
                            <button type="submit" class="btn btn-primary" name="reserve">Rezervo</button> 
                    </div>
                </div>    
            </div>
        </form>       
    </div>  
    <?php
    }   
}
?>
<?php
include("../share/footer.php");
?>
<script>
    $( function() {
    $( "#from" ).datepicker();
    dateFormat: 'yyyy-mm-dd'
    } );
    $( function() {
    $( "#to" ).datepicker();
    dateFormat: 'yyyy-mm-dd'
    } );
</script>
<script src="../../node_modules/moment/min/moment-with-locales.min.js"> </script>
<script src="../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"> </script>
</body>
</html>    
