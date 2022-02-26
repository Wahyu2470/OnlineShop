<!-- Advanced Tables -->
                    <div class="panel panel-default">
                          <?php
                                        include 'koneksi.php';
                                        $sql = mysqli_query($koneksi,"SELECT *FROM pembelian WHERE id_pembelian=$_GET[id]");
                                        $detail = $sql->fetch_assoc();
                                         ?>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <h3>Pelanggan</h3>
                                                <strong>Nama : <?php echo $detail['nama'];?></strong><br>
                                                    Email Pelanggan : <?php echo $detail['email'];?><br>
                                                    Alamat Tujuan : <?php echo $detail['alamat_tujuan'];?><br>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Pengiriman</h3>
                                                <strong> Pengiriman : <?php echo $detail['jenis_pengiriman'];?></strong><br>
                                                    Jenis Paket: <?php echo $detail['jenis_paket'];?><br>
                                                    Nomor Resi: <?php echo $detail['nomor_resi'];?><br>
                                                    Ongkos Kirim: Rp. <?php echo number_format($detail['ongkir']);?><br>
                                                    Berat : <?php echo number_format($detail['total_berat']);?> .Gr<br>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Pembayaran</h3>
                                                <strong> Transfer Melalui Bank : <?php echo $detail['nama_bank'];?></strong><br>
                                                    Tanggal Pembelian : <?php echo $detail['tanggal_pembelian'];?><br>
                                                    Total Pembayaran :Rp. <?php echo number_format($detail['total_pembelian']);?><br>
                                            </div>
                                         </div>
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang WHERE id_pembelian=$_GET[id]"); ?>
                                        <?php while ($data = $sql->fetch_assoc()) {?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $data['br_nm']; ?></td>
                                            <td><?php echo $data['br_hrg']; ?></td>
                                            <td><?php echo $data['br_jmlh']; ?></td>
                                            <td>Rp.<?php echo number_format($data['br_hrg']*$data['br_jmlh']); ?></td>
                                        </tr>   
                                     <?php 
                                    };
                                         ?> 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->