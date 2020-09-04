<?php 
include 'tabel_database.php';
include 'function_proses.php';
$nama_tabel= tabel_barang();
if (isset($_POST['submitdata'])) {
	$kd="SELECT max(kodebarang) as maxKode from $nama_tabel";
	$char="KBR";
	$kode=getKode($kd,$char);
	$sql="INSERT INTO $nama_tabel (`kodebarang`,`namabarang`,`deskripsibarang`,`satuan`,`jumlahbarang`) 
		VALUES ('$kode','$_POST[namabarang]','$_POST[deskripsibarang]','$_POST[satuanbarang]','$_POST[jumlahbarang]')";
	$pesan="Barang";
	// echo $sql;
	// die();
	$sks="../v_barang.php";
	$ggl="../v_barang.php";
	tambahdata($sql,$pesan,$sks,$ggl);
}

if (isset($_GET['del'])) {
	$sql="DELETE from $nama_tabel where kodebarang='$_GET[id]'";
	$pesan="Barang";
	$sks="../v_barang.php";
	$ggl="../v_barang.php";
	hapusdata($sql,$pesan,$sks,$ggl);


}

if (isset($_POST['editdata'])) {
	$sql="UPDATE $nama_tabel SET `namabarang`='$_POST[namabarang]',`deskripsibarang`='$_POST[deskripsibarang]',
		`jumlahbarang`='$_POST[jumlahbarang]',`satuan`='$_POST[satuanbarang]' where `kodebarang`='$_POST[kodebarang]'";
	$pesan="Barang";
	$sks="../v_barang.php";
	$ggl="../v_barang.php";
	editdata($sql,$pesan,$sks,$ggl);


}
 ?>