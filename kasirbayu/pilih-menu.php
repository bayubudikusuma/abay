<?php
include("koneksi/koneksi.php");
include("header.php");
?>
<body>


    <div class="main-content">
        <div class="card-container">
            <?php
            $sql = $koneksi->query("SELECT * FROM kasirproduk");
            while ($data= $sql->fetch_assoc()) {
                ?>
                <div class='card' style='width: 18rem; margin: 10px;'>
                
                    <?php echo "<img class='card-img-top' src='foto/" . $data['foto'] . "' width='230' height='250'>" ?>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $data['NamaProduk']?></h5>
                        <p class='card-text'>Harga: RP.<?php echo number_format($data['Harga']) ?></p>
                        <p class='card-text'>Stok: <?php echo $data['Stok']?></p>
                        <a href='transaksi.php?id=<?= $data['ProdukID']; ?>' class='btn btn-md btn-primary float-end'>Beli</a>
                    </div>
                
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</body>