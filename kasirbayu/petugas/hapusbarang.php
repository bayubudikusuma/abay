<?php
include_once("../koneksi/koneksi.php");
 
$id = $_GET['ProdukID'];
$result = mysqli_query($koneksi, "DELETE FROM kasirproduk WHERE ProdukID=$id");
header("Location:index.php?page=stok");
?>