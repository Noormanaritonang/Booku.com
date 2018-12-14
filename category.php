<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
	}
	
?>


<?php
	
	require_once "config.php";
	
	if(isset($_POST["addCategory"])){
		$categoryName = $_POST["categoryName"];
		
		$result1 = "insert into categories(Name) Values('$categoryName')";
		$sql= mysqli_query($dbhandle,$result1);
		
		echo "insert ok";
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

        <div  class="col-lg-3 ">
            <?php include('adminMenu.php');?> <!--Admin Menu-->
        </div>
        <div class="col-lg-9 ">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3  animated fadeInDown">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tambah Kategori</h3>
						</div>
						<div class="panel-body">
							<form enctype="multipart/form-data" role="form" method="POST" action="#">
								<fieldset>
									<div class="form-group">
										Nama Kategori 
										<input class="form-control"  name="categoryName" type="text" value="">
									</div>
									
									<input type="submit" class="btn  btn-primary btn-block" value="Add Category" name="addCategory"/>
									
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<table class="table table-hover table-bordered animated bounceInRight">
			<h3>List Kategori</h3>
				<thead>
					<tr class="active">
						<th >Nama</th>				  
						<th >Hapus</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
						require_once "config.php";
						
						$sql ="SELECT * FROM categories order by Id desc";
						
						$result = mysqli_query($dbhandle,$sql);
						
						while($row=mysqli_fetch_array($result))
						{	
							echo '<tr >';
							
							echo '<td>'.$row["Name"].'</td>'; 
							
							$url2="deleteCategories.php?id=".$row["Id"];
							echo '<td>'.'<a href='. $url2.'>Delete</a>'.'</td>';
							echo '</tr>';
						}
							
					?>

                </tbody>	
			</table>
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>