<h2>Data Pembayaran</h2>

<?php
include 'koneksi.php'; 
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT *FROM pembayaran JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembayaran.id_pembelian= $id_pembelian");
$data = $ambil->fetch_assoc();


?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<th><?php echo $data['nama'];?></th>
			</tr>
			<tr>
				<th>Bank</th>
				<th><?php echo $data['nama_bank'];?></th>
			</tr>
			<tr>
				<th>Jumlah</th>
				<th>Rp. <?php echo number_format($data['jumlah']); ?></th>
			</tr>
			<tr>
				<th>Tanggal</th>
				<th><?php echo $data['tanggal']; ?></th>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../Pelanggan/asset/bukti_pembayaran/<?php echo $data['bukti']?>" alt="" class="img-responsive">
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" class="form-control" name="resi" value="<?php echo $data['nomor_resi'];?>">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="barang dikirim">Barang Dikirim</option>
			<option value="batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"]))
{
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET status='$status' WHERE id_pembelian='$id_pembelian'");
	echo "<script>alert('data pembelian terupdate')</script>";
	echo "<script>location='admin.php?page=data_pembayaran';</script>";
}
?>