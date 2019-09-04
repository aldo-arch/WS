<html>
<?php
include '../share/navbar.php';
include '../share/header.php';
include '../share/databaseConnection.php'; 
?>
<link rel="stylesheet" href="../../node_modules/datatables/media/css/jquery.dataTables.min.css">
</head>
<body>
 <div class="marginForButton"></div>
    <div class="container">
<?php

$sql = "SELECT audit_id, id_user, id_employee, id_room, username, employee_name, room_number, event_time, table_name, operation FROM audit";

$result = $database_connection->query($sql);

if ($result->num_rows > 0)
 {
?>  
<table id= 'audit' class = "table table-bordered">
    <thead>
        <tr>
            <td> Audit_id </td>
            <td> Emri i perdoruesit </td>
            <td> Emri i punonjesit </td>
            <td> Numri i dhomes </td>
            <td>Koha e veprimit </td>
            <td> Emri i tabeles </td>
            <td>Veprimi i kryer </td>
        </tr> 
    </thead> 
    <tbody>
    <?php

    while($row = $result->fetch_assoc())
      {
        ?>
       <tr>
            <td><?= $row['audit_id']?></td>
            <td><?= $row['username']?></td>
            <td><?= $row['employee_name']?></td>
            <td><?= $row['room_number']?></td>
            <td><?= $row['event_time']?></td>
            <td><?= $row['table_name']?></td>
            <td><?= $row['operation']?></td>          
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
</body>

<?php
include '../share/footer.php';
?>
<script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"> </script>
<script src="../../public/js/audit.js"> </script>
</html>

