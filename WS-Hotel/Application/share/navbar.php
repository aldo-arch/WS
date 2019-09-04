<html>
<?php
session_start();// Starting Session
if(isset($_SESSION['login'])) 
{
    include 'header.php';
    ?>
    </head>
    <body> 
    <div class="container">
    <?php
        if(isset($_GET['messageSuccess'])) 
        {
            $messageSuccessReserve = $_GET['messageSuccess'];
        ?>
            <div class="alert alert-success">
                <?php
                    echo $messageSuccessReserve;
                ?>
            </div>
        <?php
        } 
    ?>
    <?php
        if(isset($_GET['messageSuccessEmail'])) 
        {
            $messageSuccessEmail = $_GET['messageSuccessEmail'];
        ?>
            <div class="alert alert-success">
                <?php
                    echo $messageSuccessEmail;
                ?>
            </div>
        <?php
        } 
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="../room_reserve/reserve.php">Rezervo <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="../room/room_select.php">Menaxho dhomat <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="../employee/index.php">Menaxho punonjesit <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="../admin/user_select.php">Menaxho perdoruesit <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="btn btn-link btn-secondary">
                    <b id="logout"><a href="../admin/logout.php">Log Out</a></b>
                </div>
            </form>
        </div>
    </nav>
    </div>
    <div class="margin"></div>
    </body>
    <?php
    include 'footer.php';
}
?>
</html>



