<?php 
	
	if(isset($_POST['login']))
	{
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			
			require_once "../config.php";	
			
			$result = mysqli_query($dbhandle,"SELECT * FROM users WHERE Email='$email' AND Password='$pass'");
			
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_array($result);
				
				@session_start();
				
				$_SESSION["UserName"] = $row["UserName"];
				$_SESSION["UserId"] = $row["UserId"];
				$_SESSION["Address"] = $row["Address"];
				$_SESSION["Phone"] = $row["Phone"];
				$_SESSION["Type"] = $row["Type"];
				
				if($_SESSION["Type"] == "admin"){
					header('Location: ../adminMenu.php');
				}else{
				
					echo '<script> window.location.href = "../index.php"</script>';
					
				}
				
			}
			else
			{
				echo "Invalid Username or Password !!";
			}
	}
	if(isset($_POST['signup']))
	{
			$name=$_POST['name'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			
			require_once "../config.php";
			$sql = "select * from users where UserName = '$username' or Email = '$email'";
			$query = mysqli_query($dbhandle,$sql);
			$row = mysqli_num_rows($query);
			if ($row!==0) {
				echo '<script type="text/javascript">
				alert ("Maaf, Email atau Username ini sudah terdaftar");
				window.history.go(-1);
				</script>
				';
			}
			else{
			$query = "insert into users(UserName,Password,Email,Type,Address,Phone) Values('$name','$pass','$email','user','$address','$phone')";
			$sql= mysqli_query($dbhandle,$query);
			echo "<script>alert('Berhasil Mendaftar')</script>";
			echo "<script>window.history.go(-1)</script>";
		}
	}		
?>
