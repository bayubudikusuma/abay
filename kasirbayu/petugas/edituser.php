<?php

include_once("../koneksi/koneksi.php");
 
if(isset($_POST['update']))
{	
	$id = $_GET['userID'];
	
	$name=$_POST['namauser'];
	$password= md5($_POST['Password']);
    $Level= $_POST['Level'];

	$result = mysqli_query($koneksi, "UPDATE user SET namauser='$name', Password='$password' WHERE userID=$id");
	
	header("Location: index.php?page=user");
    echo "<script>alert('berhasil')</script>";
}


$id = $_GET['userID'];

$result1 = mysqli_query($koneksi, "SELECT * FROM user WHERE userID=$id");
 
while($user_data = mysqli_fetch_array($result1))
{
	$name = $user_data['namauser'];
	$password = $user_data['Password'];
}
?>

<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Update User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="namauser" value="<?php echo $name; ?>" placeholder="Enter Name" name="namauser">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="Password" value="<?php echo $password; ?>" placeholder="Enter password" name="Password">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>