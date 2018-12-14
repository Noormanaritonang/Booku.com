<?php
	require_once "config.php";
	session_start();
	$id=$_GET["id"];
	$sql="SELECT * FROM products WHERE P_Id='$id'";
	$result = mysqli_query($dbhandle,$sql);
	$row=mysqli_fetch_array($result);
	
	if(isset($_POST["addCart"])){
		if($_SESSION["Type"] == "user"){
			$id			=	$_GET["id"];
			$quantity 	=	$_POST['quantity'];
			$date		=	date('Y-m-d');
			$amount		=	$row["Price"]*$quantity;
			$hargaAkhir =   $row["Price"] - ($potongan = ($row["Price"]*$row["discount"])/100);
			$userId		=	$_SESSION["UserId"];
			$P_Name		=	$row["P_Name"];
			$address	=	$_SESSION["Address"];
			$phone		=	$_SESSION["Phone"];
			$image		=	$row["Image"];
			$result1 	=	"insert into orders(User_Id,Product_Id,P_Name,Image,Address,Phone,Quantity,Amount,Date,Status,StatusAdmin) Values('$userId','$id','$P_Name','$image','$address','$phone','$quantity','$amount','$date','notChecked','notOk')";
			$sql		=	mysqli_query($dbhandle,$result1);
			
			header('location:cart.php');
			//echo "insert ok";
		}
		else{
			header('location:login.php');
		}
		
	}
	
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | Booku.com</title>
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
</head><!--/head-->

<body>
	<?php include('header.php');?> <!--header-->
	
	<section>
	
	
		<div class="container">
		
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-3">
							<div class="view-product">
								<img src="<?php echo $row["Image"];?>" alt="" />
							</div>
						</div>
						<form action="#" method="POST">
							<div class="col-sm-9">
								<div class="product-information"><!--/product-information-->
									<h2><b><?php echo $row["P_Name"];?></b></h2>
									<p><b>Oleh</b> : <i><?php echo $row["Pengarang"];?></i></p>
									<span>
										<span> Rp <?php echo $hargaAkhir = $row["Price"] - ($potongan = ($row["Price"]*$row["discount"])/100);?>,00</span>
										<label>Jumlah :</label>
										<input type="number" min="1" value="1" name="quantity" />
										<button type="submit" name="addCart" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Tambah ke Keranjang
										</button>
									</span>
									<br>
									<p><b>Stock : </b><i><?php echo $row["Stock"];?></i></p>
									<p><b>Best Seller</b> <i><?php echo $row["BestSeller"];?></i></p>
									<br>
									<p><b>Deskripsi Produk</b></p><?php echo $row["Deskripsi"];?>
									<br>
									<br>
									<p><b>Lihat <i>Review</i></b></p>
									<!--<style>
li{display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:30px;}
.highlight, .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
    <h4>Berikan Rating Produk Kami</h4>
    <input type="hidden" name="rating" id="rating" />
    <ul onMouseOut="resetRating();">
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
    </ul>

    <script>
function highlightStar(obj) {
	removeHighlight();		
	$('li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $("li").index(obj)) {
			return false;	
		}
	});
}

function removeHighlight() {
	$('li').removeClass('selected');
	$('li').removeClass('highlight');
}

function addRating(obj) {
	$('li').each(function(index) {
		$(this).addClass('selected');
		$('#rating').val((index+1));
		if(index == $("li").index(obj)) {
			return false;	
		}
	});
}

function resetRating() {
	if($("#rating").val()) {
		$('li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $("#rating").val()) {
				return false;	
			}
		});
	}
}
</script>-->			<!--<form id="form1" name="form1" method="post" action="simpan.php">
  <table width="200" border="1">
    <tr>
      <td colspan="2"><strong>Tingggalkan Komentar Anda : </strong></td>
    </tr>
    <tr>
      <td width="96">Nama</td>
      <td width="88"><label for="textfield"></label>
      <input type="text" name="nama" id="nama" /></td>
    </tr>
    <tr>
      <td>Nama Produk</td>
      <td><label for="textfield"></label>
      <input type="text" name="website" id="website" /></td>
    </tr>
    <tr>
      <td>Komentar</td>
      <td><label for="textfield"></label>
        <label for="textarea"></label>
      <textarea name="pesan" id="pesan"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="Submit"></label>
      <input type="submit" name="Submit" value="Submit" id="Submit" />
      <label for="label"></label>
      <input type="reset" name="Submit2" value="Reset" id="label" /></td>
    </tr>
  </table>
  <br>
  <p><b>Ulasan para <i>Kostumer</i></b> : </p>
</form>

<?php
//konfigurasi koneksi
//mysqli_connect ("localhost","root","");
//mysqli_select_db ($dbhandle,"ecommerce");

//inisialisasi tanggal
//$tanggal = date ("Ymd");
//inisialisasi waktu
//$time = date ("H:i:s");

//query untuk menambah data ke dalam tabel
//$query = mysqli_query ($dbhandle,"INSERT INTO tb_komentar(nama, website, pesan, tanggal, time) values ('$_POST[nama]', '$_POST[website]', '$_POST[pesan]', '$tanggal','$time')");

//query untuk menampilkan data ke dalam tabel
//$query = mysqli_query ($dbhandle,"SELECT * FROM tb_komentar ORDER BY time || tanggal DESC");
//while ($d = mysqli_fetch_array ($query))
//{
//$psn = $d['pesan'];
//echo "<table>";
//echo "<tr><td><b>$d[nama]</b> : $psn</td></tr>";
//echo "<tr><td>Produk   : <i>$d[website]</i></td></tr>";
//echo "<tr><td align=left>$d[time]: $d[tanggal]</td></tr></table><hr>";
//}
?>-->
<h3><center>Tuliskan Komentar</center></h3>
<hr>
<body>
<form action="konfirmasi.php" method="post">
Nama   :<br> <input type="text" name="nama"><br>
E-Mail :<br> <input type="text" name="email"><br>
Isi    : <br>
<textarea name="komentar" cols="45" rows="10"> </textarea><br>
<input type="submit" value="Kirim">
<input type="reset" value="Batal">

									<a href="google.com"><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</div>
						</form>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include('footer.php');?> <!--Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>