<?php include 'head.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transksi Barang Masuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Transaksi</th>
                      <th>Kode Transaksi</th>
                      <!-- <th>Penyulang</th>
                      <th>Pekerjaan</th> -->
                      <th>Nama</th>
                      <th>Nomor Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Transaksi</th>
                      <th>Tanggal</th>
                      <!-- <th>Penyulang</th>
                      <th>Pekerjaan</th> -->
                      <th>Nama</th>
                      <th>Nomor Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $qwr=mysqli_query($koneksi,"SELECT * from tbl_masuk order by kodetransaksi ASC");
                  $no=1;
                        while ($data=mysqli_fetch_array($qwr)){
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo TanggalIndo($data['tanggaltransaksi']); ?></td>
                      <td><?php echo $data['kodetransaksi']; ?></td>
                      <!-- <td><?php echo $data['penyulang']; ?></td>
                      <td><?php echo $data['pekerjaan']; ?></td> -->
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['nomorhp']; ?></td>
                      <td>
                        <a href="v_detail-transaksi-masuk.php?id=<?php echo $data['kodetransaksi'] ?>" class="btn btn-success btn-circle btn-sm" title="DETAIL"><i class="fas fa-book"></i></a>
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