<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Kota</th>
                                            <th>Nama Bank</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	include 'koneksi.php';
                                    	$sql = $koneksi->query("SELECT *FROM pembelian JOIN pembayaran ON pembelian.id_pembelian = pembayaran.id_pembelian
                                            WHERE pembelian.id_pembelian");?>
                                    	<?php while ($data = $sql->fetch_assoc()) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['nama_kota']; ?></td>
                                            <td><?php echo $data['nama_bank']; ?></td>
                                            <td><?php echo $data['tanggal_pembelian']; ?></td>
                                            <td>Rp. <?php echo number_format($data['total_pembelian']); ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                            <td>
                                               
                                                <a href="laporanper_idpembayaran.php?page=lap&id=<?php echo $data['id_pembelian']; ?>"><button class="btn btn-danger"><i class="fa fa-print "></i>Print</button></a> 
                                                <?php if ($data['status']!=="pending"): {
                                                    
                                                } ?>
                                                <a href="admin.php?page=pembayaran&id=<?php echo $data['id_pembelian']; ?>"><button class="btn btn-info">Detail</button></a>
                                            <?php endif ?>
                                        </td>
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