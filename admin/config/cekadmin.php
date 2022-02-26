
	<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['admin'])){
    die("Anda belum login");  
}

?>
