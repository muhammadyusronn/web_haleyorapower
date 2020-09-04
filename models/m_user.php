<?php 
include 'tabel_database.php';
include 'function_proses.php';
$nama_tabel= tabel_admin();

if (isset($_POST['submitdata'])) {
	$pass=md5($_POST['password']);
	$sql="INSERT INTO $nama_tabel (`username`, `password`, `nama`, `tanggallahir`, `alamat`, `nomorhp`, `level`) VALUES ('$_POST[username]','$pass','$_POST[nama]','$_POST[tanggallahir]','$_POST[alamat]','$_POST[nomorhp]','$_POST[level]')";
	$pesan="User";
	$sks="../v_user.php";
	$ggl="../f_user.php";
	tambahdata($sql,$pesan,$sks,$ggl);
}

if (isset($_GET['del'])) {
	$sql="DELETE from $nama_tabel where username='$_GET[id]'";
	$pesan="User";
	$sks="../v_user.php";
	$ggl="../v_user.php";
	hapusdata($sql,$pesan,$sks,$ggl);
}

if (isset($_POST['editdata'])) {
	if (isset($_POST['cek_pass'])) {
		$sql="UPDATE $nama_tabel SET `username`='$_POST[username]', `nama`='$_POST[nama]', `tanggallahir`='$_POST[tanggallahir]', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]', `level`='$_POST[level]' where `username`='$_POST[usernamelama]'";	
	}else{
		$pass=md5($_POST['password']);
		$sql="UPDATE $nama_tabel SET `username`='$_POST[username]', `nama`='$_POST[nama]', `tanggallahir`='$_POST[tanggallahir]', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]',`password`='$pass', `level`='$_POST[level]' where `username`='$_POST[usernamelama]'";
	}
	
	
	$pesan="User";
	$sks="../v_user.php";
	$ggl="../v_user.php";
	editdata($sql,$pesan,$sks,$ggl);
}
 ?>