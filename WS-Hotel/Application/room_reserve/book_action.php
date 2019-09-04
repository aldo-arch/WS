<?php
include("../share/databaseConnection.php");
if(isset($_GET['reserve']))
{
    $roomId = $_GET['roomId'];
    $calendar1 = $_GET['calendar1'];
    $calendar2 = $_GET['calendar2'];
    $sql1 = "select date, date_to FROM reserve WHERE id_room = ' $roomId ' ";
    $result = $database_connection->query($sql1);
    while($row = $result->fetch_assoc())
    {
        $date = $row['date'];
        $dateTo = $row['date_to'];
    }
    $cal1 = strtotime($calendar1);
    $cal2 = strtotime($calendar2);
    $date = strtotime($date);
    $dateTo = strtotime($dateTo);
    $runQuery = mysqli_query($database_connection,$sql);
    if($cal1 >= $cal2)
    {
        $messageErrorReserve = ("Zgjidhni sakte datat e rezervimit !");
        header("Location:reserve.php?messageErrorReserve={$messageErrorReserve}"); 
        return;
    }
    if(($cal1 >= $date && $cal1 <= $dateTo ||  (cal2 >= $date && $cal2 <= $dateTo)))
    {  
        $messageErrorReserve = ("Dhoma eshte e reservuar ne keto date , provoni te rezervoni nje dhome tjeter");
        header("Location:reserve.php?messageErrorReserve={$messageErrorReserve}");
    }    
    else
    {   
       $sql1 = "insert into reserve (id_room, date, date_to) VALUE ('$roomId','$calendar1','$calendar2')";
        if ($database_connection->query($sql1) === TRUE) 
        {
            $messageSuccessReserve = ("Dhoma u rezervua me sukses");
            header("Location:reserve.php?messageSuccessReserve={$messageSuccessReserve}");
        } 
   } 
}
?>

