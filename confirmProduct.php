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
	
	$result2 = "SELECT * FROM orders WHERE O_Id='$id'";
	$query2 = mysqli_query($dbhandle,$result2);
	$row2=mysqli_fetch_array($query2);
	$orderedQuantity = $row2["Quantity"];
	$productId = $row2["Product_Id"];
	
	$result1 = "SELECT * FROM products WHERE P_Id='$productId'";
	$query1 = mysqli_query($dbhandle,$result1);
	$row1=mysqli_fetch_array($query1);
	$productQuantity = $row1["Stock"];
	
	
	$newQuantity = $productQuantity -$orderedQuantity;
	
	$result = "UPDATE products SET Stock='$newQuantity' WHERE P_Id='$productId'";
	$query1 = mysqli_query($dbhandle,$result);
	
	
	
	
	$result = "UPDATE orders SET StatusAdmin='ok' WHERE O_Id='$id'";
	$query = mysqli_query($dbhandle,$result);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>