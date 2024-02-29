    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Barang</h4>
                    <p class="card-description">
                        <a href="?page=tambahbarang" title="TambahProduk" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                            <span class="text">Tambah Produk</span>
                        </a>
                    </p>

                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>produkID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                    <th>pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM kasirproduk");
                                    while ($data= $sql->fetch_assoc()) {                                    
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo "<img src='../foto/".$data['foto']."' width='70' height='70'>"; ?></td>
                                    <td><?php echo $data['NamaProduk']?></td>
                                    <td>Rp.<?php echo $data['Harga']?></td>
                                    <td><?php echo $data['Stok']?></td>
                                    <td><?php echo $data['terjual']?></td>
                                    <td></td>
                                    <td>
                                    <a href="?page=edit-brg&ProdukID=<?= $data['ProdukID'] ?>" class="btn btn-primary btn-sm">Edit</a>  <a href="?page=hapusbarang&ProdukID=<?= $data['ProdukID'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
