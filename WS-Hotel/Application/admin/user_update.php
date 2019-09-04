<?php
include '../share/navbar.php';
include '../share/databaseConnection.php';
//session_start();// Starting Session
if(isset($_SESSION['login'])) 
{   
?>
    <body>
        <div class="container">
            <?php
            if(isset($_GET['messageErrorUserUpdate'])) 
            {
                $messageErrorUserUpdate = $_GET['messageErrorUserUpdate'];
            ?>
                <div class="marginForButton"></div>
                <div class="alert alert-danger">
                    <?php
                        echo $messageErrorUserUpdate;
                    ?>
                </div>
            <?php
            }   
            $userId = $_GET['user_id'];
            $sql = "SELECT * from user where user_id = ' $userId '";
            $result = $database_connection->query($sql);
            while($row = $result->fetch_assoc()) 
            {
            ?>
                <form action="user_update_action.php" method="post">
                    <div>
                        <?php
                            if ($userId != '') 
                            { 
                        ?>
                                <input type="hidden" name="user_id" id="user_id" value="<?= $userId; ?>" />
                        <?php 
                            } 
                        ?>
                        <div class="marginForButton"></div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" name="username"  id="username" placeholder="Vendos username" value="<?= $row['username']; ?>"/>
                        </div>
                        <div class="marginForButton"></div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-at"></i></div>
                            </div>                               
                            <input type="email" class="form-control"  name="email"  id="email" placeholder="Email" value="<?= $row['email']; ?>"/>
                        </div>
                        <div class="marginForButton"></div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control"  name="name"  id="name" placeholder="Emri" value="<?= $row['name']; ?>"/>
                        </div>
                        <div class="marginForButton"></div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-phone"></i></div>
                            </div>
                            <input  class= "form-control"type="number" name="celular" placeholder="Celular" value="<?= $row['celular']; ?>"/> 
                        </div>
                        <div class="form-group">
                        <div class="marginForButton"></div>
                        <label>Zgjidh rolin</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-user-secret"></i></div>
                            </div>
                            <select class="form-control" name="role" id="role" value="<?= $row['role']; ?>">
                                <option id="role">User</option>
                                <option id="role">Admin</option>
                            </select>
                        </div>
                        <div class="marginForButton"></div>
                        <button type="submit" class="btn btn-primary" name="update">Edito</button>
                    </form>
                </div>
            <?php 
            }
            ?> 
        </div>
    </body>
<?php
}
?>
</html>
