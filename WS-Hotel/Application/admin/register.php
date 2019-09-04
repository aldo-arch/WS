<!DOCTYPE html>
<html lang="en">
<?php
include("../share/header.php");  
?>
</head>
<body>
	<div class="container">
		<h1>Regjistrohu</h1>
		<form method="post" action="register_action.php">
			<?php
			if(isset($_GET['messageError'])) 
			{
				$messageError = $_GET['messageError'];
			?>
				<div class="marginForButton"></div>
				<div class="alert alert-danger">
  					<?php
						echo $messageError;
					?>
				</div>
			<?php
			} 
			?>
			<div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-user"></i></div>
				</div>	
				<input type="text" class="form-control" id="username" placeholder="Fut emrin e perdoruesit" name="username" required>
			</div>
			<div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-lock"></i></div>
				</div>
				<input type="password" class="form-control" id="password" placeholder="Fut fjalekalimin" name="password" required>
			</div>
			<div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-at"></i></div>
                </div>
				<input type="email" class="form-control" id="email" placeholder="Fut email" name="email" required>
			</div>
			<div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                </div>
				<input type="text" class="form-control" id="name" placeholder="Fut emrin" name="name" required>
			</div>
			<div class="marginForButton"></div>
			<div class="input-group">
				<div class="input-group-append">
					<div class="input-group-text"><i class="fa fa-phone"></i></div>
				</div>
				<input type="number" class="form-control" id="phoneNumber" placeholder="Fut celularin" name="phoneNumber" required>
			</div>
			<div class="marginForButton"></div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="register">Regjistrohu</button>
			</div>
			<div class="form-group">
				Je i regjistruar? <button class="btn btn-link btn-primary"><a href="login.php">Hyr</a></button>
			</div>	
		</form>
	</div>	
</body>
<?php
include("../share/header.php");  
?>
</html>

