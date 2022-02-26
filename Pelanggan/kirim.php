<?php

// panggil library phpmailer
include 'phpmailer/PHPMailerAutoload.php';

// Jika tombol submit ditekan maka akan mulai proses pengiriman konfirmasi pembayaran ke email ADMIN
if(isset($_POST['checkout']))
{
  $id_pelanggan = $_SESSION["customer"]['id_pelanggan'];
  $nama = $_SESSION["customer"]['nama'];
  $email = $_SESSION["customer"]['email_customer'];
  $kota = $_POST["kota"];
  $alamat = $_POST["alamat"];
  $nama_kiriman = $_POST["nama_kiriman"];
  $paket = $_POST["paket"];
  $ongkir = $_POST["ongkir"];
  $berat = $_POST["berat"];
  $id_bank= $_POST['id_bank'];
  $tanggal_pembelian = date('Y-m-d');

  $query_bank = $koneksi->query("SELECT *FROM bank WHERE id_bank='$id_bank'");
  $data_bank = $query_bank->fetch_assoc();
  $nama_bank = $data_bank['nama_bank'];

  $total_pembelian = $totalbelanja + $ongkir;

   $mail = new PHPMailer;

  //$mail->SMTPDebug = 2;                                     // Enable verbose debug output

  $mail->isSMTP();                                            // Set mailer to use SMTP
  $mail->Host     = 'smtp.gmail.com';                            // Mengatur SMTP yg akan digunakan (yg ini pake gmail)
  $mail->SMTPAuth = true;                                     // Enable SMTP authentication

  $mail->Username = (' tokodora48@gmail.com ');                      // SMTP username email penerima
  $mail->Password = '';                           // SMTP password email penerima
  $mail->Port     = 587;                                      // TCP port to connect to

  $mail->setFrom( 'tokodora48@gmail.com' );                             // Asal email pengirim
  $mail->addAddress('email_customer', 'nama');  // Email dan Nama Penerima Email
  $mail->addReplyTo(' '.$email.' ');         

  $mail->isHTML(true);                                        // Mengeset format email sebagai HTML

  $mail->Subject = 'Konfirmasi Pembayaran dari: Toko Dora ';
  $mail->Body    = 'Nama Pengirim: Admin <br/><br/>
                    Email pengirim: tokodora48@gmail.com <br/><br/>
                    Total Pembelian :'.$total_pembelian.'<br></br>
                    Transfer Melalui Bank :'.$bank.'<br></br>
                    Untuk Pembayaran Harap Transfer Ke Nomer Rekening Dengan No Rekening. 44579663214567 BRI Atas Nama Shinta Wahyu Kurniasih';

  // Jika pesan gagal dikirim, maka akan muncul alert: Pesan gagal terkirim, harap dicoba kembali
  if(!$mail->send())
  {
    echo "Pesan gagal terkirim, harap dicoba kembali";
  }
    // Jika berhasil maka akan muncul alert: Pesan Anda berhasil terkirim
    else
    {
      echo "<script>alert('Pesan Anda berhasil terkirim, terima kasih');history.go(-1)</script>";
    }
}
  // Peringatan apabila user tidak melalui proses yang seharusnya atau tembak langsung
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombolnya!');history.go(-1)</script>";
  }
?>
