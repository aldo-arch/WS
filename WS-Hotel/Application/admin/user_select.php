<?php
    include("../share/databaseConnection.php");   
    include("../share/navbar.php");
  //  session_start();// Starting Session
if(isset($_SESSION['login'])) 
{  
?>
    <!-- Custom css files -->
    <link rel="stylesheet" href="../../node_modules/datatables/media/css/jquery.dataTables.min.css">
    </head>
    <body>
        <div class="marginForButton"></div>
        <div class="container">
            <?php
            if(isset($_GET['messageSuccessUser'])) 
            {
                $messageSuccessUser = $_GET['messageSuccessUser'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageSuccessUser;
                    ?>
                </div>
            <?php
            } 
            if(isset($_GET['messageSuccessUserUpdate'])) 
            {
                $messageSuccessUserUpdate = $_GET['messageSuccessUserUpdate'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-success">
                    <?php
                        echo $messageSuccessUserUpdate;
                    ?>
                </div>
            <?php
            } 
            if(isset($_GET['messageSuccessUserDelete'])) 
            {
                $messageSuccessUserDelete = $_GET['messageSuccessUserDelete'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-danger">
                    <?php
                        echo $messageSuccessUserDelete;
                    ?>
                </div>
            <?php
            } 
            $sql = "SELECT user_id, username, password, email, name, celular, role FROM user";
            $result = $database_connection->query($sql);
            if ($result->num_rows > 0) 
            {
                // output data of each row
            ?>  
                <table id="user" class = "table table-bordered table-secondary">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Perdoruesi </th>
                            <th>Fjalekalimi </th>
                            <th>Email </th>
                            <th>Emri </th>
                            <th>Celulari</th>
                            <th>Roli</th>
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
                                    <td> <?= $row['user_id']  ?> </td>
                                    <td> <?= $row['username'] ?> </td>
                                    <td> <?= $row['password'] ?> </td>
                                    <td> <?= $row['email'] ?> </td>
                                    <td> <?= $row['name'] ?> </td>
                                    <td> <?= $row['celular'] ?> </td>
                                    <td> <?= $row['role'] ?> </td>
                                    <td> <?= "<a href='user_update.php?user_id=" . $row['user_id'] ."'><button type='button' class='btn btn-warning'> Ndrysho </button></a>" ?> </td> 
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
            <a class="btn btn-primary" href="user_insert.php" role="button">Shto perdorues</a>
            </button>
        </div>
        <?php
        $userId = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $sql = "SELECT * from user where user_id = ' $userId '";
        $result = $database_connection->query($sql);
        while($row = $result->fetch_assoc()) 
        {
        ?>
            <div>
            <?php
                if ($userId != '') 
                { 
            ?>
                    <input type="hidden" name="user_id" id="user_id" value="<?= $userId; ?>" />
            <?php 
                } 
        }        
        ?>                 
    </body>
    <!-- Custom Scripts -->
    <script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"> </script>
    <script src= "../../public/js/userDatatable.js"> </script>
    <script src= "../../public/js/user_delete.js"> </script>
<?php 
}
?>
</html>

                        