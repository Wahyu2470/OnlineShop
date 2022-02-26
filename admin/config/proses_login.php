<?php

include "../koneksi/+connection.php";
if(isset($_POST['submit']))
{				
	$username	= $_POST['username'];
	$password	=  $_POST['password'];
					
	$query = mysqli_query($connection, "SELECT *FROM admin1 WHERE username='$username' AND password='$password'");
	
		$result = mysqli_num_rows($query);
		
		if($result)		
		{
		$akun = $query->fetch_assoc();	
		$_SESSION["admin"] = $akun;	
		header("Location:admin.php");
		}
	
		else
		{
			$error = "Failed Login";
		}
	}

			
?>