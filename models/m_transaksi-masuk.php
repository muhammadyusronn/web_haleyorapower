<?php 
session_start();
include 'config.php';
include 'tabel_database.php';
include 'function_proses.php';
$nama_tabel= tabel_masuk();
$nama_tabeldetail= tabel_detailmasuk();
$nama_tabelbarang= tabel_barang();

if (isset($_POST['submitdata'])) {
	$pj=$_SESSION['username'];
	$kd="SELECT max(kodetransaksi) as maxKode from $nama_tabel";
	$char="TRM";
	$kode=getKode($kd,$char);
	$sql="INSERT INTO $nama_tabel (`kodetransaksi`, `nama`,`nomorhp`, `tanggaltransaksi`, `penanggungjawab`) 
		VALUES ('$kode','$_POST[nama]','$_POST[nomorhp]','$_POST[tanggaltransaksi]','$pj')";
	$exc=mysqli_query($koneksi,$sql);
	//  die();
	if ($exc) {
       foreach ($_SESSION["pemasukan_cart"] as $keys => $values) {
           $qwery="INSERT INTO $nama_tabeldetail (`kodetransaksi`, `kodebarang`, `jumlahbarang`) 
		   	VALUES ('$kode','$values[kodebarang]','$values[jumlahorder]')";
		   $ekc=mysqli_query($koneksi,$qwery);
		   
	   }
	   //die();
           if ($ekc) {
	           	foreach ($_SESSION["pemasukan_cart"] as $keys => $values) {
	           $qwery="UPDATE $nama_tabelbarang SET jumlahbarang=jumlahbarang+'$values[jumlahorder]' where kodebarang='$values[kodebarang]'";
	           $eks=mysqli_query($koneksi,$qwery);
	       		}
	       		//die();
	       		unset($_SESSION['pemasukan_cart']);
	       		echo "<script>alert('Data Transaksi Berhasil Disimpan!');window.location='../v_detail-transaksi-masuk.php?id=$kode'</script>";
           }else{
			echo "<script>alert('Data Transaksi Gagal Disimpan!');window.location='../v_transaksi-barang-masuk.php'</script>";
		   }
	}else{
		echo "<script>alert('Data Transaksi Gagal Disimpan!');window.location='../v_transaksi-barang-masuk.php'</script>";	}
}
 ?>