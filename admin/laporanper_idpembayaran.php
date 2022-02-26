<?php
error_reporting(0);
$nama_dokumen='Laporan'; //Beri nama file PDF hasil.
define('mpdf60/');//lokasi folder mpdf
require_once("mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait

$mpdf->setFooter('{PAGENO}');// memberikan footer nomor halaman

ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan Pembayaran</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {font-size: 18px}
.style12 {	font-weight: bold;
	color: #006600;
	font-size: 24px;
	font-family: Broadway;
}
.style13 {color: #006600}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="center">
    <p align="center" class="style4"><img src="assets/images/Toko1.jpg">
    <p align="center" class="style12"> LAPORAN TRANSAKSI TOKO DORA </p>
    </p>
    <table width="856" border="1" cellpadding="0" cellspacing="0">
      <tr bgcolor="#006600">
        <td width="41"><div align="center" class="style3">No.</div></td>
        <td width="100"><div align="center" class="style3">Nama</div></td>
        <td width="110"><div align="center" class="style3">Alamat</div></td>
        <td width="100"><div align="center" class="style3"> Pengiriman</div></td>
        <td width="110"><div align="center" class="style3">Nama Bank</div></td>
        <td width="150"><div align="center" class="style3">Tanggal Pembayaran</div></td>
        <td width="150"><div align="center" class="style3">Total Pembayaran</div></td>
        <td width="150"><div align="center" class="style3">Status</div></td>
      </tr>
      </tr>

<?php
$nomor=1;
include 'koneksi.php';
$sql = $koneksi->query("SELECT *FROM pembelian
WHERE id_pembelian=$_GET[id]")or die(mysqli_error());
$no=1;
while ($data=mysqli_fetch_array($sql))
{
?>
       <tr bgcolor="#5bc0de">
       <td><?php echo $nomor; ?></td>
       <td><?php echo $data['nama']; ?></td>
       <td><?php echo $data['alamat_tujuan']; ?></td>
       <td><?php echo $data['jenis_pengiriman']; ?></td>
       <td><?php echo $data['nama_bank']; ?></td>
       <td><?php echo $data['tanggal_pembelian']; ?></td>
       <td>Rp. <?php echo number_format($data['total_pembelian']); ?></td>
       <td><?php echo $data['status']; ?></td>
      </tr>
      <?php
	$nomor++;
};
	?>
    </table>
    <script>
    window.print();
    </script>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>

