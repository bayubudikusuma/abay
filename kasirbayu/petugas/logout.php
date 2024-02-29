<?php

session_start();
session_destroy();

echo "<script>('berhasil logout')</script>";

header("location:login.php");
?>