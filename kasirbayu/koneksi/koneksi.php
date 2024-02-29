<?php
    $host ="localhost";
    $user ="root";
    $pass ="";

    $db ="kasirbayu";
    $koneksi = mysqli_connect($host,$user,$pass,$db);
    mysqli_select_db ($koneksi,$db);

    if(!$koneksi) {
            die('maaf koneksi gagal: '. $connect->connect_error);
    }
    else{
        //echo 'tahu';
        //echo $_SESSEION{'Viewnya'};
    }
?>