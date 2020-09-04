<?php include 'head.php'; 
include 'models/proses-transaksi.php';
?>
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
                      <td><?php echo $data['jumlahbarang'].' '.$data['satuan']; ?></td>
                      <td>
                        <a href="" class="btn btn-primary btn-circle btn-sm" title="ORDER" data-id="<?php echo $data['kodebarang']?>" data-toggle="modal" data-target="#orderModal"><i class="fas fa-cart-arrow-down"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Tabel Detail Order -->
          <?php if (isset($_SESSION['penjualan_cart'])) { ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="2"></th>
                      <th><a href="?cancel=true" onclick="javascript: return confirm('Apakah anda yakin membatalkan transaksi?');" class="btn btn-warning">CANCEL</a></th>
                      <th><a href="f_checkout-transaksi.php" class="btn btn-success">CHECKOUT</a></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  $nox=1;
                    foreach ($_SESSION["penjualan_cart"] as $keys => $values) {
                    ?>
                    <tr>
                      <td><?php echo $no++;; ?></td>
                      <td><?php echo $values['namabarang']; ?></td>
                      <td><?php echo $values['jumlahorder']; ?></td>
                      <td>
                        <a href="?action=delete&id=<?php echo $values['kodebarang']; ?>" class="btn btn-danger btn-circle btn-sm" 
                          onclick="javascript: return confirm('Apakah anda yakin menghapus barang dari transaksi?');" title="HAPUS"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php 
                } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>

                    <!-- table success end -->
                    <div class="modal fade bd-example-modal-lg" id="orderModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Tambah Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- basic form start -->
                                        <div class="fetched-data"></div>
                            <!-- basic form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#orderModal').on('show.bs.modal', function (e) {
                                        var rowid = $(e.relatedTarget).data('id');
                        //menggunakan fungsi ajax untuk pengambilan data
                                    $.ajax({
                                        type : 'post',
                                        url : 'modal-transaksi.php',
                                        data :  'rowid='+ rowid,
                                        success : function(data){
                                        $('.fetched-data').html(data);//menampilkan data ke dalam modal
                                        }
                                    });
                                });
                            });
                        </script>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include 'foot.php'; ?>