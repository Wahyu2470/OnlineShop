<?php
include 'koneksi.php';
$br_id=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM makanan WHERE br_id ='$br_id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="?page=lihat_makanan";



</script>