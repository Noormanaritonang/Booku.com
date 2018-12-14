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
           
		    <table class="table table-hover table-bordered animated fadeIn">
			
			<div class="col-md-12 form-group">
				
				<form method="POST" action="#">
				<fieldset>
					<div class="col-md-3">
						
						  <select type="submit" name="month" class="form-control" onchange="this.form.submit()">                      
							  <option value="0">--Pilih Bulan--</option>
							  <option value="1">Januari</option>
							  <option value="2">Februari</option>
							  <option value="3">Maret</option>
							  <option value="4">April</option>
							  <option value="5">Mei</option>
							  <option value="6">Juni</option>
							  <option value="7">Juli</option>
							  <option value="8">Agustus</option>		  
							  <option value="9">September</option>
							  <option value="10">Oktober</option>
							  <option value="11">November</option>
							  <option value="12">Desember</option>
							
							</select>
						
				</div>
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<b>
					<font size="5" color="#191987">
						<?php
							if(isset($_POST['month'])){
								$monthNum = $_POST['month'];
								
									$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
									echo $monthName; 
								
							}else{
								echo "All";
							}
						?>
					</font>
				</b>
				</fieldset>
				
				</form>
			</div>
			
			<h3>Sell's Report</h3>
				<thead>
					<tr class="active">
							
						<th >Image</th>				  
						<th >Name</th>
						<th >Total Quantity</th>				  
						<th >Total Amount</th>	
									  
						
					</tr>
				</thead>
				<tbody>
					<?php 
					
						require_once "config.php";
						
						if(isset($_POST['month'])){
							
							$_SESSION["monthFromAdminReport"] = $_POST['month'];
							$monthForSearch = $_POST['month'];
							
							$sqlForProduct ="SELECT distinct P_Name, Image, Product_Id FROM orders WHERE StatusAdmin='Ok' and MONTH(Date) = '$monthForSearch'";
							$resultForProduct = mysqli_query($dbhandle,$sqlForProduct);
							
							while($rowForProduct=mysqli_fetch_array($resultForProduct))
							{	
								$productName = $rowForProduct["P_Name"];
								
								$sqlForTotal = "select sum(Quantity) as totalQuantity, sum(Amount) as totalAmount from orders where P_Name='$productName' and StatusAdmin='Ok' and MONTH(Date) = '$monthForSearch'";
								$resultForTotal = mysqli_query($dbhandle,$sqlForTotal);
								$rowForTotal = mysqli_fetch_array($resultForTotal);
								
								echo '<tr >';
								
								echo '<td><img src="'.$rowForProduct["Image"].'" width="70" height="70" alt="not found"></td>'; 
								
								$url22 = "reportAdminDetails.php?id=".$rowForProduct["Product_Id"];
								
								echo '<td><a href="'.$url22.'">'.$productName.'</a></td>'; 
								echo '<td>'.$rowForTotal["totalQuantity"].'</td>'; 
								echo '<td>'.$rowForTotal["totalAmount"].'</td>'; 
								
								echo '</tr>';
								
								@$totalQuantity += $rowForTotal["totalQuantity"];
								@$totalAmount += $rowForTotal["totalAmount"];
						
								
							}
						}
						else{
							$_SESSION["monthFromAdminReport"] = null;
							$sqlForProduct ="SELECT distinct P_Name, Image, Product_Id FROM orders WHERE StatusAdmin='Ok'";
							$resultForProduct = mysqli_query($dbhandle,$sqlForProduct);
							
							while($rowForProduct=mysqli_fetch_array($resultForProduct))
							{	
								$productName = $rowForProduct["P_Name"];
								
								$sqlForTotal = "select sum(Quantity) as totalQuantity, sum(Amount) as totalAmount from orders where P_Name='$productName' and StatusAdmin='Ok'";
								$resultForTotal = mysqli_query($dbhandle,$sqlForTotal);
								$rowForTotal = mysqli_fetch_array($resultForTotal);
								
								echo '<tr >';
								
								echo '<td><img src="'.$rowForProduct["Image"].'" width="70" height="70" alt="not found"></td>'; 
								
								$url22 = "reportAdminDetails.php?id=".$rowForProduct["Product_Id"];
								
								echo '<td><a href="'.$url22.'">'.$productName.'</a></td>'; 
								echo '<td>'.$rowForTotal["totalQuantity"].'</td>'; 
								echo '<td>'.$rowForTotal["totalAmount"].'</td>'; 
								
								echo '</tr>';
								
								@$totalQuantity += $rowForTotal["totalQuantity"];
								@$totalAmount += $rowForTotal["totalAmount"];
								
							}
						}
						
						echo '<tr class="success">';
						echo '<td></td>'; 
						echo '<td><b>'."Total".'</b></td>'; 
						echo '<td><b>'.$totalQuantity.'</b></td>'; 
						echo '<td><b>'.$totalAmount.'</b></td>'; 
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