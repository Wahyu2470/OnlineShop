<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['pelanggan'])){
    die("Anda belum login");
}

?>