<?php
session_start();
$id_masakan = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_masakan]))
{
	$_SESSION['keranjang'][$id_masakan]+=1;
}
else
{
	$_SESSION['keranjang'][$id_masakan] = 1;
}
 
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang belanjaan');</script>";
echo "<script>location='keranjang.php';</script>";
?>