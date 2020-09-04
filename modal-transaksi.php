<?php 
include 'models/config.php';
include 'fnc.php';
if (isset($_POST['rowid'])) { ?>
<?php 
$id=$_POST['rowid'];
$sql="SELECT * from tbl_barang where kodebarang='$id'";
$exc=mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_array($exc)) { ?>
<form action="#" method="POST">
    <div class="form-group">
        <label for="example-text-input" class="col-form-label">Nama Barang</label>
        <input class="form-control" type="hidden" name="kodebarang" value="<?php echo $row['kodebarang'] ?>" readonly>
        <input class="form-control" type="text" name="namabarang" value="<?php echo $row['namabarang'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="col-form-label">Jumlah Barang Tersedia</label>
        <input class="form-control" type="text" name="jumlahbarang" value="<?php echo $row['jumlahbarang'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="col-form-label">Jumlah Barang Dibutuhkan</label>
        <input class="form-control" type="text" name="jumlahorder" required>
    </div>
    <button type="submit" name="pesan" class="btn btn-primary mt-4 pr-4 pl-4">ORDER</button>
</form>

<?php 
    }
}
 ?>
