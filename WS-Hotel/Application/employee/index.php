<?php
include '../share/navbar.php';
include '../share/databaseConnection.php'; 
//session_start();// Starting Session
if(isset($_SESSION['login'])) 
{  
?>
<link rel="stylesheet" href="../../node_modules/datatables/media/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
    <div class="marginForButton"></div>
<?php
$sql = "SELECT employee_id, employee_name, job, salary FROM employee";
$result = $database_connection->query($sql);

if ($result->num_rows > 0)
 {
?>  
<table id= 'employee' class = "table table-bordered">
    <thead>
        <tr>
            <td> Employee_id </td>
            <td> Employee_name </td>
            <td>Job </td>
            <td> Salary </td>
            <td> </td>
            <td> </td>
        </tr> 
    </thead> 
    <tbody>
<?php
      while($row = $result->fetch_assoc())
      {
          ?>
       <tr>
            <td><?= $row['employee_id']?></td>
            <td><?= $row['employee_name']?></td>
            <td><?= $row['job']?></td>
            <td><?= $row['salary']?></td>
            <td><a href='update.php?employee_id=<?= $row['employee_id'] ?>'><button class= 'btn btn-warning'>Ndrysho</button></a> </td> 
            <td> <button type='button' class='btn btn-danger' onclick=showDeleteModal("<?=$row['employee_id']; ?>") data-dismiss="modal" data-target="#myModal" >Fshi</button> </td>  
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
 echo "0 results";
 }

$database_connection->close();

?> 

<a class="btn btn-primary" href="addEmployee.php" role="button">Shto punonjes</a>

        <div class="modal fade" id='myModal' role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Fshirja e punonjesit</h4>
                    </div>
                    <div class="modal-body">
                        <p>Jeni i sigurt qe doni te fshini punonjesin</p>
                    </div>
                    <form action="deleteEmployee.php" method="POST">
                        <input type="hidden" name="employee_id" id="employee_id" value="" />    
                                                                                      
                        <div class="modal-footer">   
                        <button type="button" data-dismiss="modal" class="btn btn-secondary" >Anullo</button>                             
                        <button type="submit" name="delete" class="btn btn-danger" >Fshi</button>
                        </div>
                    </form>
                </div>                      
            </div>
        </div>

</body>

<?php
include '../share/footer.php';
?>

<script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"> </script>
<script src="../../public/js/employee_datatable.js"></script>
<script src="../../public/js/employeeIndex.js"></script>
<?php
}
?>
</html>
