<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<?php
	$id=$_GET['id'];
	require_once "config.php";
	/*
	$result = "Select * from products where P_Id='$id'";
	$query = mysql_query($result);
	$row=mysql_fetch_array($query);
	unlink($row["Image"]);
	*/
	$result = "Delete from products where P_Id='$id'";
	$query = mysqli_query($dbhandle,$result);
	
	header('Location: productList.php');
?>