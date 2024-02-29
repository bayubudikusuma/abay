<?php 
include_once("../koneksi/koneksi.php");

$id = $_GET['userID'];

$result = mysqli_query($koneksi, "DELETE FROM user WHERE userID=$id ");

header("Location:index.php?page=user");
?>
