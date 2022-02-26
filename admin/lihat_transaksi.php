 <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Email</th>
                                            <th>Kota</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Total Pembelian</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                        $nomor=1;
                                    	include 'koneksi.php';
                                    	$sql = $koneksi->query("SELECT *FROM pembelian 
                                            WHERE id_pembelian");?>
                                    	<?php while ($data = $sql->fetch_assoc()) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['nama_kota']; ?></td>
                                            <td><?php echo $data['tanggal_pembelian']; ?></td>
                                            <td><?php echo $data['total_pembelian']; ?></td>
                                            <td>
                                            	<a href="admin.php?page=data_detail&id=<?php echo $data['id_pembelian']; ?>"><button class="btn btn-info">Detail</button></a><a href="laporanper_idpembelian.php?page=lapl&id=<?php echo $data['id_pembelian']; ?>"><button class="btn btn-danger"><i class="fa fa-print "></i>Print</button></a></td>
                                        </tr>   
                                        <?php 
                                        $nomor++;
                                    };
                                         ?>                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->