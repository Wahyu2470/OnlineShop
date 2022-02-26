<?php
    require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    $br_id = $_GET['id']; 
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
             
       if ($act == "plus") {
            if (isset($_SESSION['keranjang'][$br_id])) {
                if (isset($_SESSION['keranjang'][$br_id])) {
                    $_SESSION['keranjang'][$br_id] += 1;
                    echo "<script>alert('produk sudah di tambah');</script>";
					echo "<script>location='keranjang.php';</script>";
                }
            }
        } elseif ($act == "min") {
            if (isset($_SESSION['keranjang'][$br_id])) {
                if (isset($_SESSION['keranjang'][$br_id])) {
                    $_SESSION['keranjang'][$br_id] -= 1;
                    echo "<script>alert('produk telah dikurangi');</script>";
					echo "<script>location='keranjang.php';</script>";
                }
            }
        }  
         
        echo "<script></script>";
    }   
     
?>