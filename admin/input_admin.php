
		<div class="col-md-8">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h3>Tambah Data Admin</h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
								<form  action="" method="post" enctype="multipart/form-data" role="form">
								<div class="form-group">
								    <label>Nama Lengkap</label>
								    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Lengkap" />							 
								</div>
								<div class="form-group">
								    <label>Nomor Telepon</label>
								    <input type="text" name="notlpn" class="form-control" placeholder="Masukkan Nomor Telepon" />							 
								</div>
								<div class="form-group">
								    <label>Username</label>
								    <input type="text" name="user" class="form-control" placeholder=" Masukkan Username" />
								</div>
								<div class="form-group">
								    <label> Password</label>
								    <input type="password" name="password" class="form-control" placeholder=" Masukkan Password" />
								</div>
								<div class="form-group">
									<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
									<input type="reset" name="reset" value="Reset" class="btn btn-danger">
									
								</div>
								</form>
								<?php
								include 'koneksi.php';
								if (isset($_POST["simpan"])) 
{
		$kd_user = @$_POST['kd_user'];
        $nama = @$_POST['nama'];
        $notlpn = @$_POST['notlpn'];
      	$username = @$_POST['user'];
        $password = @$_POST['password'];
        $koneksi->query("INSERT INTO admin1 (nama,notlpn,username,password) values('$nama','$notlpn','$username','$password')") or die (mysqli_error());	

           ?>

         <script type="text/javascript">
          alert(" Sukses !  Data berhasil disimpan! ");     
         </script>
           

        <?php
       }


      

     ?>
     </div>
 </div>
</div>
</div>
</div>