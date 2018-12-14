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
    <title>Home | Booku.comr</title>
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
           
		    <table class="table table-hover table-bordered animated fadeIn">
			<h3>Laporan Penjualan</h3>
				<thead>
					<tr class="active">
						<th >Tanggal</th>	
						<th >Gambar</th>				  
						<th >Nama</th>
						<th >Kuantitas</th>				  
						<th >Jumlah</th>
						<th >Username</th>				  
						<th >Telepon</th>
									  
						
					</tr>
				</thead>
				<tbody>
					<?php 
					
						require_once "config.php";
						
						$productId = $_GET["id"];
						if(isset($_SESSION["monthFromAdminReport"])){
							$monthFromAdminReport = $_SESSION["monthFromAdminReport"];
							$sql ="SELECT * FROM orders WHERE Product_Id = '$productId' and StatusAdmin='Ok' and MONTH(Date) = '$monthFromAdminReport'";
							$result = mysqli_query($dbhandle,$sql);
						}else{
							$sql ="SELECT * FROM orders WHERE Product_Id = '$productId' and StatusAdmin='Ok'";
							$result = mysqli_query($dbhandle,$sql);
						}
						
						
						
						while($row=mysqli_fetch_array($result))
						{	
							$userId = $row["User_Id"];
							$sql11 ="SELECT UserName FROM users WHERE UserId='$userId'";
							$result11 = mysqli_query($dbhandle,$sql11);
							$row11=mysqli_fetch_array($result11);
							
							echo '<tr >';
							echo '<td>'.$row["Date"].'</td>'; 
							echo '<td><img src="'.$row["Image"].'" width="70" height="70" alt="not found"></td>'; 
							echo '<td>'.$row["P_Name"].'</td>'; 
							echo '<td>'.$row["Quantity"].'</td>'; 
							echo '<td>'.$row["Amount"].'</td>'; 
							echo '<td>'.$row11["UserName"].'</td>'; 
							echo '<td>'.$row["Phone"].'</td>'; 
							
							
							echo '</tr>';
							
							@$totalQuantity += $row["Quantity"];
							@$totalAmount += $row["Amount"];
						}
						
						echo '<tr class="success">';
						
						echo '<td><b>'."Total".'</b></td>'; 
						echo '<td></td>'; 
						echo '<td></td>'; 
						echo '<td><b>'.$totalQuantity.'</b></td>'; 
						echo '<td><b>'.$totalAmount.'</b></td>'; 
						echo '<td></td>'; 
						echo '<td></td>'; 
						echo '</tr >';
						
							
					?>

                    </tbody>	
				</table>
		   
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>