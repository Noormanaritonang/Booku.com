<?php
	session_start();
	if($_SESSION["Type"] == "user"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<?php
	
	$userId = $_SESSION["UserId"];
	require_once "config.php";
		
	$result = "Select * from users where UserId='$userId'";
	$query = mysqli_query($dbhandle,$result);
	$row=mysqli_fetch_array($query);
	
	if(isset($_POST['update']))
		{
			$userId = $_SESSION["UserId"];
			$userName = $_POST["userName"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			
			
			require_once "config.php";
			
			$result = "update users set UserName='$userName', Email='$email', Phone='$phone', Address='$address' where UserId='$userId'";
			$sql = mysqli_query($dbhandle,$result);
		
			$profileUpdate = "Profile Update Successfully !!";
			//header('Location: userAccount.php');
		}
		else if(isset($_POST['change']))
		{
			if($_POST['pass'] == $_POST['rePass']){
				
				$userId = $_SESSION["UserId"];
				$pass = $_POST["pass"];
				
				require_once "config.php";
				
				$result = "update users set Password='$pass' where UserId='$userId'";
				$sql = mysqli_query($dbhandle,$result);
				
				$passChange = "Password Change Successfully !!";
				//header('Location: userAccount.php');
			}
			else{
				$passChange = "Password does not match !!";
			}
			
		}
		
			
			
			
		
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Booku.com</title>
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
</head>
<body>
    <?php include('header.php');?> <!--header-->

    </br>

<div class="container body-content">
    <div class="row panel" >

        <div class="col-sm-6 ">
			<div class="col-md-8 col-md-offset-2">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Information</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" role="form" method="POST" action="#">
						<fieldset>
							<div class="form-group">
								Nama Anda 
								<input class="form-control"  name="userName" type="text" value="<?php echo $row["UserName"];?>">
							</div>
							
							<div class="form-group">
								Email
								<input class="form-control"  name="email" type="text"  value="<?php echo $row["Email"];?>">
							</div>
							
							<div class="form-group">
								Telepon 
								<input class="form-control"  name="phone" type="number" value="<?php echo $row["Phone"];?>">
							</div>
							
							<div class="form-group">
								Alamat
								<input class="form-control"  name="address" type="text" value="<?php echo $row["Address"];?>">
							</div>
							
							<input type="submit" class="btn  btn-primary btn-block" value="Update" name="update"/>
							<?php
								if(isset($profileUpdate)){
									echo $profileUpdate;
								}
							?>
						</fieldset>
					</form>
				</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		
        <div class="col-sm-5">
            
			<div class="col-md-8 col-md-offset-2">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Ubah Password</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" role="form" method="POST" action="#">
						<fieldset>
							<div class="form-group">
								Password Baru 
								<input class="form-control"  name="pass" type="text" value="">
							</div>
							
							<div class="form-group">
								Ulangi Password
								<input class="form-control"  name="rePass" type="text"  value="">
							</div>
							
							<input type="submit" class="btn  btn-primary btn-block" value="Change" name="change"/>
							<?php
								if(isset($passChange)){
									echo $passChange;
								}
							?>
						</fieldset>
					</form>
				</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>