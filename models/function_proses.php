<?php 

function tambahdata($qwery,$pesan,$sukses,$gagal){
	include 'config.php';
	$exc=mysqli_query($koneksi,$qwery);
	 // echo "$qwery";
	 // die();
	if ($exc) {
		echo "<script>alert('Data ".$pesan." Berhasil Ditambahkan');window.location='".$sukses."'</script>";
	}else{
		echo "<script>alert('Data ".$pesan." Gagal Ditambahkan');window.location='".$gagal."'</script>";
	}
}

function hapusdata($qwery,$pesan,$sukses,$gagal){
	include 'config.php';
	$exc=mysqli_query($koneksi,$qwery);
	if ($exc) {
		echo "<script>alert('Data ".$pesan." Berhasil Dihapus');window.location='".$sukses."'</script>";
	}else{
		echo "<script>alert('Data ".$pesan." Gagal Dihapus');window.location='".$gagal."'</script>";
	}
}

function cancelbooking($qwery,$qwery2,$pesan,$link){
	include 'config.php';
	$exc=mysqli_query($koneksi,$qwery);
	if ($exc) {
		$do=mysqli_query($koneksi,$qwery2);
		if ($do) {
			echo "<script>alert('Data ".$pesan." Berhasil Dihapus');window.location='".$link."'</script>";
		}else{
			echo "<script>alert('Data ".$pesan." Gagal Dihapus');window.location='".$link."'</script>";
		}
		
	}else{
		echo "<script>alert('Data ".$pesan." Gagal Dihapus');window.location='".$link."'</script>";
	}
}
function pembayaran($qwery,$qwery2,$pesan,$link){
	include 'config.php';
	$exc=mysqli_query($koneksi,$qwery);
	if ($exc) {
		$do=mysqli_query($koneksi,$qwery2);
		if ($do) {
			echo "<script>alert('Data ".$pesan." Berhasil Ditambah');window.location='".$link."'</script>";
		}else{
			echo "<script>alert('Data ".$pesan." Gagal Ditambah');window.location='".$link."'</script>";
		}
		
	}else{
		echo "<script>alert('Data ".$pesan." Gagal Dihapus');window.location='".$link."'</script>";
	}
}

function editdata($qwery,$pesan,$sukses,$gagal){
	include 'config.php';
	$exc=mysqli_query($koneksi,$qwery);
	if ($exc) {
		echo "<script>alert('Data ".$pesan." Berhasil Diedit');window.location='".$sukses."'</script>";
	}else{
		echo "<script>alert('Data ".$pesan." Gagal Diedit');window.location='".$gagal."'</script>";
	}
}

function kodeacak($sql,$char){
	include 'config.php';
	// echo "$sql";
	$hasil = mysqli_query($koneksi,$sql);
	$data  = mysqli_fetch_array($hasil);
	$kode = $data['kode'];

	$noUrut = (int) substr($kode, 4, 3);

	$noUrut++;
	$kode = $char . sprintf("%03s", $noUrut);

	return ($kode);
}

function getKode($sql,$char){
include 'config.php';
$hasil = mysqli_query($koneksi,$sql);
$data  = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];

$noUrut = (int) substr($kode, 4, 3);

$noUrut++;
$kode = $char . sprintf("%03s", $noUrut);

return ($kode);
}




?>
