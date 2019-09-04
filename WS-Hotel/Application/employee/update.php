<html>
<?php
include '../share/navbar.php';
include '../share/databaseConnection.php';
//session_start();// Starting Session
//$_SESSION['id'] = $userData['user_id'];
if(isset($_SESSION['login'])) 
{      
?>
  <body>
    <div class="marginForButton"></div>
    <div class="container">

  <?php
  $employeeId = $_GET['employee_id'];
  $sql = "SELECT * from employee where employee_id = '$employeeId'";
  $result = $database_connection->query($sql);
  while($row = $result->fetch_assoc())
   {
  ?>
    <form action="updateEmployee.php" method="post">
        <div>

            <?php
              if ($employeeId != '') 
              { 
              ?>
                <input type="hidden" name="employee_id" id="employee_id" value="<?= $employeeId; ?>" />

                <?php 
                } 
                ?>
                <div class="form-group">
                    <label for="employee_name">Emri</label>
                    <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Vendos emrin" value="<?= $row['employee_name']; ?>" />
                </div>

                <div class="form-group">
                    <label for="job">Puna</label>
                    <input type="text" class="form-control" name="job" id="job" placeholder="Puna" value="<?= $row['job']; ?>" />
                </div>

                <div class="form-group">
                    <label for="salary">Paga</label>
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Paga" value="<?= $row['salary']; ?>"/>

                </div>
                <button type="submit" class="btn btn-primary">Ndrysho</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
}

$database_connection->close(); 
}
?>