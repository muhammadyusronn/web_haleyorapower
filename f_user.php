<?php 
include 'head.php';
?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Form Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<?php if (isset($_GET['edit'])): ?>
            		<h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
            	<?php endif ?>
            	<?php if (!isset($_GET['edit'])): ?>
            		<h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
            	<?php endif ?>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-7">
            		<?php if (isset($_GET['edit'])) { 
            			$sql="SELECT * from tbl_admin where username='$_GET[id]'";
            			$exc=mysqli_query($koneksi,$sql);
            			while ($data=mysqli_fetch_array($exc)) { ?>
            			<form class="user" action="models/m_user.php" method="POST">
			                <div class="form-group">
			                	<label>Nama User</label>
			                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan Nama User" value="<?php echo $data['nama'] ?>">
			                </div>
			                <div class="form-group">
			                	<label>Tanggal Lahir User</label>
			                  <input type="date" class="form-control form-control-user" name="tanggallahir" placeholder="Masukkan Nama User" value="<?php echo $data['tanggallahir'] ?>">
			                </div>
			                <div class="form-group">
			                	<label>Username User</label>
			                  <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username User" value="<?php echo $data['username'] ?>">
			                  <input type="hidden" class="form-control form-control-user" name="usernamelama" placeholder="Masukkan Username User" value="<?php echo $data['username'] ?>">
			                </div>
			                <div class="form-group">
			                	<label>Password User</label>
			                  <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password User">
			                  <input type="checkbox" name="cek_pass">&nbsp;<strong style="color: red;">CEKLIST JIKA TIDAK MERUBAH PASSWORD</strong>
			                </div>
			                <div class="form-group">
			                	<label>Alamat User</label>
			                  <input type="text" class="form-control form-control-user" name="alamat" placeholder="Masukkan Alamat User" value="<?php echo $data['alamat'] ?>">
			                </div>
			                <div class="form-group">
			                	<label>Nomor Handphone User</label>
			                  <input type="text" class="form-control form-control-user" name="nomorhp" placeholder="Masukkan Nomor Handphone User" value="<?php echo $data['nomorhp'] ?>">
			                </div>
			                <div class="form-group">
			                	<label>Level User</label>
			                  <select class="form-control" name="level" placeholder="Halo">
			                  	<option>Pilih Level User</option>
			                  	<option>Admin</option>
			                  	<option>Pimpinan</option>
			                  </select>
			                </div>
			                <div class="form-group row">
			                  <div class="col-sm-3 mb-3 mb-sm-0">
			                    <input type="submit" class="btn btn-warning" name="editdata" value="EDIT">
			                  </div>
			                </div>
			            </form>
            		 <?php }
            			}else{ ?>	              
            			<form class="user" action="models/m_user.php" method="POST">
			                <div class="form-group">
			                	<label>Nama User</label>
			                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan Nama User">
			                </div>
			                <div class="form-group">
			                	<label>Tanggal Lahir User</label>
			                  <input type="date" class="form-control form-control-user" name="tanggallahir" placeholder="Masukkan Nama User">
			                </div>
			                <div class="form-group">
			                	<label>Username User</label>
			                  <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username User">
			                </div>
			                <div class="form-group">
			                	<label>Password User</label>
			                  <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password User">
			                </div>
			                <div class="form-group">
			                	<label>Alamat User</label>
			                  <input type="text" class="form-control form-control-user" name="alamat" placeholder="Masukkan Alamat User">
			                </div>
			                <div class="form-group">
			                	<label>Nomor Handphone User</label>
			                  <input type="text" class="form-control form-control-user" name="nomorhp" placeholder="Masukkan Nomor Handphone User">
			                </div>
			                <div class="form-group">
			                	<label>Level User</label>
			                  <select class="form-control" name="level" placeholder="Halo">
			                  	<option>Pilih Level User</option>
			                  	<option>Admin</option>
			                  	<option>Pimpinan</option>
			                  </select>
			                </div>
			                <div class="form-group row">
			                  <div class="col-sm-3 mb-3 mb-sm-0">
			                    <input type="submit" class="btn btn-primary" name="submitdata" value="SUBMIT">
			                  </div>
			                </div>
			            </form>
			        <?php } ?>
          			</div>
          		</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include 'foot.php'; ?>