<?php 
include 'head.php';
?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Form Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-primary">Form Pilih Periode</h6>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-7">         
            			<form class="user" action="cetak-laporan-masuk.php" method="POST" target="_BLANK">
			                <div class="form-group">
			                	<label>Tanggal Mulai</label>
			                  <input type="date" class="form-control form-control-user" name="tanggalmulai" required>
			                </div>
			                <div class="form-group">
			                	<label>Tanggal Akhir</label>
			                  <input type="date" class="form-control form-control-user" name="tanggalakhir" required>
			                </div>
			                <div class="form-group row">
			                  <div class="col-sm-3 mb-3 mb-sm-0">
			                    <input type="submit" class="btn btn-primary" name="submitperiode" value="SUBMIT">
			                  </div>
			                </div>
			            </form>
          			</div>
          		</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include 'foot.php'; ?>