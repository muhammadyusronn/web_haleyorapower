<?php include 'head.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="col-sm-3 mb-3 mb-sm-0">
              <a href="f_user.php" class="btn btn-primary">Tambah Data</a>
            </div>
            <br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Nomor Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Nomor Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $qwr=mysqli_query($koneksi,"SELECT * from tbl_admin");
                  $no=1;
                        while ($data=mysqli_fetch_array($qwr)){
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['alamat']; ?></td>
                      <td><?php echo TanggalIndo($data['tanggallahir']); ?></td>
                      <td><?php echo $data['nomorhp']; ?></td>
                      <td>
                        <a href="models/m_user.php?del&id=<?php echo $data['username'] ?>" class="btn btn-danger btn-circle btn-sm" title="HAPUS" onclick="javascript: return confirm('Apakah anda yakin menghapus data?')"><i class="fas fa-trash"></i></a>
                        <a href="f_user.php?edit&id=<?php echo $data['username'] ?>" class="btn btn-warning btn-circle btn-sm" title="EDIT"><i class="fas fa-exclamation-triangle"></i></a>

                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include 'foot.php'; ?>