
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Booku.com</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<?php include('header.php');?> <!--Footer-->
	
	<section id=""><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form animated bounceInLeft"><!--login form-->
						<h2>Silahkan Login dengan Akun Anda</h2>
						<form action="controllers/usercontroller.php" method="POST">
							
							<input name="email" type="email" placeholder="Email Address" required/>
							<input name="pass" type="password" placeholder="Password" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Biarkan Saya Masuk
							</span>
							<button name="login" type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1 animated bounceInDown">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form animated bounceInRight"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="controllers/usercontroller.php" method="POST">
							<input name="name" type="text" placeholder="Name" required/>
							<input name="email" type="email" placeholder="Email Address" required/>
							<input name="address" type="text" placeholder="Address" required/>
							<input name="phone" type="number" placeholder="Phone" required/>
							<input name="pass" type="password" placeholder="Password" required/>
							<input name="pass" type="password" placeholder="Re-Password" required/>
							<button name="signup" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
					<?php
						if (isset($_SESSION['message'])){
							echo '<div class="alert alert-info">'.$_SESSION['message'].'</div>';
							$_SESSION['message']='';
						}
					?>
				</div>
			</div>
		</div>
	</section><!--/form-->
	</br>
	<br>
	<br>
	<?php include('footer.php');?> <!--Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>