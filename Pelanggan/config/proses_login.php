<?php

include "../koneksi/+connection.php";
if(isset($_POST['submit']))
{				
	$username	= $_POST['username'];
	$password	=  $_POST['password'];
					
	$query = mysqli_query($connection, "SELECT *FROM pelanggan WHERE username='$username' AND password='$password'");
	
		$result = mysqli_num_rows($query);
		$_SESSION['nama']=$result['nama'];
		if($result)		
		{
		$akun = $query->fetch_assoc();	
		$_SESSION["pelanggan"] = $akun;
		$_SESSION["username"]=$username;	
		header("Location:pelanggan/pelanggan.php");
		}
	
		else
		{
			$error = "Failed Login";
		}
	}

			
?>