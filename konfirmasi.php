<?
$nama=$_POST['nama'];
$email=$_POST['email'];
$komentar=$_POST['komentar'];
mysqli_connect("localhost","root","");
mysqli_select_db($dbhandle,"ecommerce");
$result=mysqli_query($dbhandle,"insert into data values('null','$nama','$email','$komentar')");
if ($result) {
echo "Data Berhasil Dikirim..<br>";
}
echo "<br><a href='product-details.php'>Lihat Komentar</a>";
?>