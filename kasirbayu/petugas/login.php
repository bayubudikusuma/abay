<?php
include "../koneksi/koneksi.php";

error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $namauser = $_POST['namauser'];
    $Password = md5 ($_POST['Password']);

    $sql = "SELECT * FROM user WHERE namauser='$namauser' AND Password='$Password'";
    $result = mysqli_query($koneksi, $sql);

    if($result->num_rows > 0) {
        $row =mysqli_fetch_assoc($result);
        $_SESSION['namauser']= $row['namauser'];
     
        // mengambil informasi Level dari database
     $level =$row['Level'];
     $_SESSION['Level'] = $level;
       
     header("location: index.php");
     echo "<script>alert('berhasil masuk!')</script>";
    } else {
        echo "<script>alert('username atau Password anda salah ,silahkan coba lagi')</script>";
    }
}
?>



<!doctype html>
<html lang="utf-8">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>bootstrap demo</title>
        <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt -5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3 mt-3">
                                            <table for=""class="form-label">nama</table>
                                            <input type="text"name="namauser"class="form-control"require autofocus>
                                        </div>
                                        <div class="mb-3 mt-3">
                                    <label for="" class="form-label">password</label>     
                                    <input type="Password" name="Password" class="form-control" require >
                                </div>
                                    <button name="submit" class="btn btn-primary">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script src="../bootstrap-5.3.2.-dist/bootstrap.min.js"></script>
     <script src="../bootstrap-5.3.2.-dist//jquery.min.js "></script>
        </body>
   </html>



                                                                        
                                    
