<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
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
        <div class="col-lg-9">
           <?php
				require_once "config.php";
				$userId=$_GET['id'];
				$sql="SELECT * FROM users WHERE UserId='$userId'";
				$result = mysqli_query($dbhandle,$sql);
				$row=mysqli_fetch_array($result)
				
			?>
			
			<p><b>User Name:</b> &nbsp <?php echo $row["UserName"];?></p>
			<p><b>Address: &nbsp  &nbsp  &nbsp </b> <?php echo $row["Address"];?></p>
			<p><b>Email:</b>&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  <?php echo $row["Email"];?></p>
			<p><b>Phone:</b>&nbsp &nbsp  &nbsp  &nbsp  &nbsp <?php echo $row["Phone"];?></p>
		   <div class="table-responsive ">
				<table class="table ">
					<thead>
						<tr >
							<td >Item</td>
							<td >Nama</td>
							<td >Kuantitas</td>
							<td >Total harga</td>
							<td >Konfirmasi</td>
							<td >Batalkan</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						require_once "config.php";
						$userId=$_GET['id'];
						$sql="SELECT * FROM orders WHERE User_Id='$userId' AND StatusAdmin='notOk'";
						$result = mysqli_query($dbhandle,$sql);
						
						$cartTotal=0;
						
						while($row=mysqli_fetch_array($result)){
							
							$cartTotal=$cartTotal+$row["Amount"];
							
							$url1="confirmProduct.php?id=".$row["O_Id"];
							$url2="deleteProductToCart.php?id=".$row["O_Id"];
							
							echo '<tr>
									<td>
										<a href=""><img src="'.$row["Image"].'" width="100" height="100" alt="not found"></a>
									</td>
									<td >
										<h4><a href="">'.$row["P_Name"].'</a></h4>
										<p>Product ID: '.$row["Product_Id"].'</p>
									</td>
									
									<td >
										<p>'.$row["Quantity"].'</p>
									</td>
									<td>
										<p class="cart_total_price">'.$row["Amount"].'</p>
									</td>
									<td >
										<a class="cart_quantity_delete" href="'.$url1.'">confirm</a>
									</td>
									<td >
										<a class="cart_quantity_delete" href="'.$url2.'"><i class="fa fa-times"></i></a>
									</td>
								</tr>';
						};
					?>
						
					</tbody>
					
					<h3>Total: <?php echo $cartTotal;?></h3>
				</table>
			</div>
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>