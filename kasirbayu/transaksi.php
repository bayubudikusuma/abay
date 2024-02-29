<?php
include('koneksi/koneksi.php');
include("header.php");

$id = $_GET['id'];

if (isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $nomeja = $_POST['nomeja'];
    $menu_jumlah = $_POST['menu'];
    $jumlah_array = $_POST['jumlah'];
    $stok = true;

    foreach ($menu_jumlah as $i => $item) {
        $parts = explode("|", $item);
        $produk_id = $parts[0];
        $harga = $parts[1];
        $jumlah = $jumlah_array[$i];

        $sql_stok = $koneksi->query("SELECT Stok FROM kasirproduk WHERE ProdukID = '$produk_id'");
        $row = $sql_stok->fetch_assoc();
        $stok_produk = $row['Stok'];

        if ($jumlah > $stok_produk) {
            $stok = false;
            break;
        }
    }
    if ($stok) {
        $sql = $koneksi->query("INSERT INTO kasirpenjualan (TanggalPenjualan) VALUES ('$tanggal')");
        $id_transaksi_baru = mysqli_insert_id($koneksi);

        $sql = $koneksi->query("INSERT INTO kasirpelanggan (PelangganID, NamaPelanggan, NoMeja) VALUES ('$id_transaksi_baru', '$nama', '$nomeja')");

        foreach ($menu_jumlah as $i => $item) {
            $parts = explode("|", $item);
            $produk_id = $parts[0];
            $harga = $parts[1];
            $jumlah = $jumlah_array[$i];

            $sql3 = $koneksi->query("INSERT INTO kasirdetailpenjualan (DetailID, ProdukID, JumlahProduk, Subtotal) VALUES ('$id_transaksi_baru', '$produk_id', '$jumlah', '$harga')");
            $sql4 = $koneksi->query("UPDATE kasirproduk SET Stok = Stok - $jumlah  WHERE ProdukID = '$produk_id'");
            $sql5 = $koneksi->query("UPDATE kasirproduk SET Terjual = Terjual + $jumlah WHERE ProdukID = '$produk_id'");
        }

        header("Location: daftar-transaksi.php");
        exit();
    } else {
        echo "<script>alert('Maaf, jumlah pesanan melebihi stok yang tersedia. Silakan periksa kembali pesanan Anda.')</script>";
    }
}
?>


  
<script>
    function tambahMenu() {
        var container = document.getElementById("menuContainer");
        var newMenuInput = document.createElement("div");

        newMenuInput.innerHTML = `
            <div class="">
                <label for="menu" class="form-label">Menu</label>
                <select id="menu" name="menu[]" class="form-control">
                    <option>Pilih Menu</option>
                    <?php
                        $sql6 = $koneksi->query("SELECT * FROM kasirproduk WHERE Stok > 0");
                        while ($data = $sql6->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga']; ?>">
                        <?php echo $data['NamaProduk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]">
                <button type="button" onclick="hapusMenu(this)" class="btn btn-danger mt-3 col-12">Hapus</button>
            </div>
        `;

        container.appendChild(newMenuInput);
    }

    function hapusMenu(button) {
        var divToRemove = button.parentNode.parentNode;
        divToRemove.remove();
    }
</script>

        <div class="p-4" id="main-content">
          <div class="card mt-5" style="background-color: rgb(245,245,245)">
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Buat Pemesanan</h2>
                    <form action="" method="POST">
                        <div class="">
                            <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tanggal" name="tanggal" readonly required>
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nama" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nomeja" class="form-label">No Meja</label>
                            <input type="number" min="1" class="form-control" id="nomeja" name="nomeja" required>
                        </div>
                        </div>
                        <div id="menuContainer">
                          <div>
                              <label for="menu" class="form-label">Menu</label>
                              <select id="menu" name="menu[]" class="form-control">
                                <option>Pilih Menu</option>
                                <?php
                                    $sql7 = $koneksi->query("SELECT * FROM kasirproduk WHERE Stok > 0");
                                    while ($data = $sql7->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga']; ?>">
                                    <?php echo $data['NamaProduk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok']; ?>
                                </option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="jumlah" class="form-label">Jumlah</label>
                              <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]" required>
                          </div>
                          
                        </div>

                        <button type="button" class="btn btn-warning me-3" onclick="tambahMenu()">Tambah Menu+</button>

                        <button type="submit" name="tambah" class="btn btn-primary">Pesan</button>
                    </form>
                </div>            
            </div>
          </div>
        </div>