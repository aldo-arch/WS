<html>
<?php
include '../share/navbar.php';
//session_start();// Starting Session
if(isset($_SESSION['login'])) 
{    
?>
    <body>
    <div class="marginForButton"></div>
        <div class="container">
            <form action="add.php" method="post">
                <div>
                    <div class="form-group">
                        <label for="employee_name">Emri</label>
                        <input type="text" class="form-control" name="emri" id="employee_name" placeholder="Vendos emrin"  required />
                    </div>
                    <div class="form-group">
                        <label for="job">Puna</label>
                        <input type="text" class="form-control" name="puna" id="job" placeholder="Puna"  required />
                    </div>
                    <div class="form-group">
                        <label for="salary">Paga</label>
                        <input type="number" class="form-control" name="paga" id="salary" placeholder="Paga"  required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Shto</button>
                    <a class="btn btn-primary" href="index.php" role="button">Anullo</a>
            </button>
                </div>
            </form>
        </div>
    </body>
<?php
include '../share/footer.php';
}
?>
</html>