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
			<h3>User List</h3>
				<thead>
					<tr class="active">
						<th >Nama</th>				  
						<th >E-mail</th>
						<th >Telepon</th>
						<th >Alamat</th>
						<th >Tipe</th>
						<th >Delete</th>
						
						
					</tr>
				</thead>
				<tbody>
					<?php 
					
						require_once "config.php";
						
						//$id=$_SESSION['id'];
						$sql ="SELECT * FROM users order by UserId desc";
						
						$result = mysqli_query($dbhandle,$sql);
						
						while($row=mysqli_fetch_array($result))
						{	
							echo '<tr >';
							
							echo '<td>'.$row["UserName"].'</td>'; 
							echo '<td>'.$row["Email"].'</td>';
							echo '<td>'.$row["Phone"].'</td>';
							echo '<td>'.$row["Address"].'</td>';
							echo '<td>'.$row["Type"].'</td>'; 
							
							if($row["Type"] == "user"){
								$url2="deleteUser.php?id=".$row["UserId"];
								echo '<td>'.'<a href='. $url2.'>Delete</a>'.'</td>';
								echo '</tr>';
							}
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