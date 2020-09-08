<?php include 'head.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
           <!-- Tabel Detail Order -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $nox=1;
                  $totalbiaya=0;
                  $qw="SELECT tbl_detailmasuk.*,tbl_barang.namabarang as namabarang, tbl_barang.satuan as satuan from tbl_detailmasuk,tbl_barang where kodetransaksi='$_GET[id]' and tbl_detailmasuk.kodebarang=tbl_barang.kodebarang";
                  // echo "$qw";
                  $sql=mysqli_query($koneksi,$qw);
                    while ($values=mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                      <td><?php echo $nox++;; ?></td>
                      <td><?php echo $values['namabarang']; ?></td>
                      <td><?php echo $values['jumlahbarang'].' '.$values['satuan']; ?></td>
                    </tr>
                  <?php 
                } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Checkout Pembelian</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-7">
                  <?php 
                    $qw_ds=mysqli_query($koneksi,"SELECT * from tbl_masuk where tbl_masuk.kodetransaksi='$_GET[id]'");
                    while ($data=mysqli_fetch_array($qw_ds)) {
                   ?>
                  <form class="user" action="models/m_pembelian.php" method="POST">
                      <div class="form-group">
                        <label>Kode Pembayaran</label>
                        <input type="text" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['kodetransaksi']; ?>" readonly>
                      </div>
                      <!-- <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['pekerjaan']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Penyulang</label>
                        <input type="text" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['penyulang']; ?>" readonly>
                      </div> -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['nama']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="text" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['nomorhp']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Tranasksi</label>
                        <input type="date" class="form-control form-control-user" name="totalbelanja1" value="<?php echo $data['tanggaltransaksi']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <a href="cetak-struk-masuk.php?id=<?php echo $data['kodetransaksi'] ?>" class="btn btn-success" target="_BLANK"><i class="fas fa-download">&nbsp;</i>DOWNLOAD BUKTI TRANSAKSI</a>
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