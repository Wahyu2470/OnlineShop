<table align="center" width="90%" border="1">
	<tr style="height: 40px; text-align: center; color: white; background-color: dodgerblue;">
		<th style="text-align: center;"> Nama Lengkap</th>
		<th style="text-align: center;"> Username</th>
		<th style="text-align: center;"> Nomor Telepon</th>
	</tr>
	<!-- Untuk Menampilkan data dari DB-->
	<?php 
	include 'koneksi.php';
	$sql = mysqli_query($koneksi,"select * from admin1") or die(mysqli_error());

	while ( $tampil = mysqli_fetch_array($sql)) {
		# code...
	

	 ?>
	<tr  style="height: 25px;">
		<td> <?php echo $tampil ['nama']; ?> </td>
		<td> <?php echo  $tampil ['username'] ; ?> </td>
		<td> <?php echo $tampil ['notlpn'] ; ?> </td>
	</tr>
	<?php 
};
	 ?>
	
</table>
<p class="text-center">
                                    <a href="?page=input_admin"> <button class="btn btn-info"> Tambah Data</button> </a>
            </p> 