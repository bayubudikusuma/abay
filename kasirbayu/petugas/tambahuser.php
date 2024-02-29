<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Tambah User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-label">namauser:</label>
                            <input type="text" class="form-control" id="nama" placeholder="Enter Name" name="namauser">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Password">
                        </div>
                        <div class=mb-3>
                            <label for="pwd" class="form-label">level<spam style="color: red;">
                            <select name="level" class="form-control">
                                <option value="">pilih level</option>
                                <option value="Admin">admin</option>
                                <option value="petugas">petugas</option>
                        </select>
                    </div>
                     <button type="submit" name="submit" class="btn btn-primary">Login</button>
                 </form>
            </div>
        </div>
    </div>

<?php 
    include_once("../koneksi/koneksi.php");
    if(isset($_POST['submit'])) {
		$name = $_POST['namauser'];
		$Password = md5($_POST['Password']);
        $level = $_POST['level'];
		

		// Insert user data into table
		$result = mysqli_query($koneksi, "INSERT INTO user (namauser, Password,level) VALUES('$name','$Password', '$level')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php?page=user'>View Users</a>";
	}
?>