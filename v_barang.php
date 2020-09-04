<?php include 'head.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Deskripsi Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Deskripsi Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $qwr=mysqli_query($koneksi,"SELECT * from tbl_barang");
                  $no=1;
                        while ($data=mysqli_fetch_array($qwr)){
                  ?>
                    <tr>
                      <td><?php echo $no++;; ?></td>
                      <td><?php echo $data['kodebarang']; ?></td>
                      <td><?php echo $data['namabarang']; ?></td>
                      <td><?php echo $data['deskripsibarang']; ?></td>
                      <td><?php echo $data['jumlahbarang']; ?></td>
                      <td>
                        <a href="models/m_barang.php?del&id=<?php echo $data['kodebarang'] ?>" class="btn btn-danger btn-circle btn-sm" title="HAPUS" onclick="javascript: return confirm('Apakah anda yakin menghapus data?')"><i class="fas fa-trash"></i></a>
                        <a href="?edit&id=<?php echo $data['kodebarang'] ?>" class="btn btn-warning btn-circle btn-sm" title="EDIT"><i class="fas fa-edit"></i></a>

                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php if (isset($_GET['edit'])) { ?>
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
              <?php }else{ ?>
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
              <?php } ?>
                
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-7">
                  <?php if (isset($_GET['edit'])) { 
                      $qwe=mysqli_query($koneksi,"SELECT * from tbl_barang where kodebarang='$_GET[id]'");
                      while ($row=mysqli_fetch_array($qwe)) { ?>
                    <form class="user" action="models/m_barang.php" method="POST">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="hidden" class="form-control form-control-user" name="kodebarang" placeholder="Masukkan Nama Barang" value="<?php echo $row['kodebarang'] ?>">
                        <input type="text" class="form-control form-control-user" name="namabarang" placeholder="Masukkan Nama Barang" value="<?php echo $row['namabarang'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control form-control-user" name="jumlahbarang" placeholder="Masukkan Jumlah Barang" value="<?php echo $row['jumlahbarang'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Satuan Barang</label>
                        <select class="form-control form-control" name="satuanbarang"> 
                        <option value="0">Pilih Satuan Barang</option>
                        <option value="Buah">Buah</option>
                        <option value="SET">SET</option>
                        <option value="Meter">Meter</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <textarea class="form-control form-control-user" name="deskripsibarang"><?php echo $row['deskripsibarang']; ?></textarea>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <input type="submit" class="btn btn-warning" name="editdata" value="EDIT">
                        </div>
                      </div>
                  </form>
                  <?php 
                      }
                    }else{ ?>
                    <form class="user" action="models/m_barang.php" method="POST">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control form-control-user" name="namabarang" placeholder="Masukkan Nama Barang">
                      </div>
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control form-control-user" name="jumlahbarang" placeholder="Masukkan Jumlah Barang">
                      </div>
                      <div class="form-group">
                        <label>Satuan Barang</label>
                        <select class="form-control form-control" name="satuanbarang"> 
                        <option value="0">Pilih Satuan Barang</option>
                        <option value="Buah">Buah</option>
                        <option value="SET">SET</option>
                        <option value="Meter">Meter</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <textarea class="form-control form-control-user" name="deskripsibarang"></textarea>
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

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include 'foot.php'; ?>