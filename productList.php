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
        <div class="col-lg-9 ">
            <table class="table table-hover table-bordered animated bounceInRight">
			<h3>Product List</h3>
				<thead>
					<tr class="active">
						<th >Gambar</th>
						<th >Nama</th>				  
						<th >Kategori</th>
						<th >Stock</th>
						<th >Harga</th>
						<th >Width</th>
						<th >Weight</th>
						<th >Height</th>
						
						<th >Hapus</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
						require_once "config.php";
						
						//$id=$_SESSION['id'];
						$sql ="SELECT * FROM products order by P_Id desc";
						
						$result = mysqli_query($dbhandle,$sql);
						
						while($row=mysqli_fetch_array($result))
						{	
							echo '<tr >';
							echo '<td><img src="'.$row["Image"].'" width="100" height="100" alt="image not found"></td>'; 	

							$url1="editProduct.php?id=".$row["P_Id"];
							echo '<td>'.'<a href='. $url1.'>'.$row["P_Name"].'</a>'.'</td>';
							
							echo '<td>'.$row["Category"].'</td>'; 
							echo '<td>'.$row["Stock"].'</td>';
							echo '<td>'.$row["Price"].'</td>'; 
							echo '<td>'.$row["Width"].'</td>'; 
							echo '<td>'.$row["Weight"].'</td>';
							echo '<td>'.$row["Height"].'</td>'; 
							
							$url2="deleteProduct.php?id=".$row["P_Id"];
							echo '<td>'.'<a href='. $url2.'>Delete</a>'.'</td>';
							echo '</tr>';
						}
						//mysql_close($db);		
					?>

                    </tbody>	
				</table>
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>