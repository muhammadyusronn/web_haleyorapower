<?php include 'head.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
           <!-- Tabel Detail Order -->
          <?php if (isset($_SESSION['penjualan_cart'])) { ?>
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
                  <tfoot>
                    <tr>
                      <th colspan="2"></th>
                      <th><a href="v_transaksi-barang.php?cancel=true" onclick="javascript: return confirm('Apakah anda yakin membatalkan transaksi?');" class="btn btn-danger">CANCEL</a></th>                    
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  $nox=1;
                  $totalbiaya=0;
                    foreach ($_SESSION["penjualan_cart"] as $keys => $values) {
                    ?>
                    <tr>
                      <td><?php echo $nox++;; ?></td>
                      <td><?php echo $values['namabarang']; ?></td>
                      <td><?php echo $values['jumlahorder']; ?></td>
                    </tr>
                  <?php 
                } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Checkout Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-7">
                  <form class="user" name="form1" action="models/m_transaksi.php" method="POST">
                      <div class="form-group">
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control form-control-user" name="pekerjaan" required>                      
                      </div>
                      <div class="form-group">
                        <label>Penyulang</label>
                        <input type="text" class="form-control form-control-user" name="penyulang" required>                      
                      </div>
                        <label>Nama Petugas</label>
                        <input type="text" class="form-control form-control-user" name="nama" required>                      
                      </div>
                      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="text" class="form-control form-control-user" name="nomorhp" required>                      
                      </div>
                      <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control form-control-user" name="tanggaltransaksi" required>                      
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <input type="submit" class="btn btn-primary" name="submitdata" value="SUBMIT">
                        </div>
                      </div>
                  </form>
                </div>
              </div>
          </div>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include 'foot.php'; ?>
      <script type="text/javascript">
        function hitung(){
          var myForm = document.form1;
          var totalbayar = (parseFloat(myForm.diskon.value)/100)*parseFloat(myForm.totalreal.value);
          myForm.total.value=parseFloat(myForm.totalreal.value)-totalbayar; 
        }
      </script>