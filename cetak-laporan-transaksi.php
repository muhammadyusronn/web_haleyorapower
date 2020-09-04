<?php
session_start();
error_reporting(0);
ob_start();

include 'fnc.php';
include 'models/config.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CETAK LAPORAN PENJUALAN</title>
<style type="text/css">
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding-left: 5px;
  padding-right: 5px;
}
</style>
</head>
<body>
<div>
  <h3 align=center><u>Laporan Pemakaian Material Hartekdist</u><br>
  Periode <?php echo TanggalIndo($_POST['tanggalmulai']).' Sampai '.TanggalIndo($_POST['tanggalakhir']); ?></h3><br>
</div>

<table class="table" width="100%" align="center" border="1">
<tr align="center">
  <th style="width: 10px">#</th>
  <th style="width: 20px">Kode</th>
  <th style="width: 100px">Tanggal</th>
  <th style="width: 100px">Penyulang</th>
  <th style="width: 300px">Pekerjaan</th>
  <th style="width: 100px">Jenis</th>
  <th style="width: 100px">Satuan</th>
</tr>
<?php 
$nox=1;
$totalpenjualan=0;
$sql1="SELECT * from tbl_transaksi where tanggaltransaksi BETWEEN '$_POST[tanggalmulai]' AND '$_POST[tanggalakhir]' order by tanggaltransaksi ASC";
$gett=mysqli_query($koneksi,$sql1);
while ($values=mysqli_fetch_array($gett)) {
  ?>
<tr align="center">
  <th style="width: 10px"><?php echo $nox++; ?></th>
  <th style="width: 100px"><?php echo $values['kodetransaksi']; ?></th>
  <th style="width: 100px"><?php echo TanggalIndo($values['tanggaltransaksi']); ?></th>
  <th style="width: 100px"><?php echo $values['penyulang']; ?></th>
  <th style="width: 300px"><?php echo $values['pekerjaan']; ?></th>
  <th style="width: 100px">
      <?php
        $qqq="SELECT tbl_detailtransaksi.*, tbl_barang.namabarang as namabrg 
        from tbl_detailtransaksi,tbl_barang where tbl_detailtransaksi.kodetransaksi='$values[kodetransaksi]' 
        AND tbl_detailtransaksi.kodebarang=tbl_barang.kodebarang";
        $getb=mysqli_query($koneksi,$qqq);
        while($rx=mysqli_fetch_array($getb)){ 
          echo ' - '.$rx['namabrg'].'<br>';
        } 
        ?>
  </th>
  <th style="width: 100px">
  <?php
        $qqq1="SELECT tbl_detailtransaksi.*, tbl_barang.satuan as satuan 
        from tbl_detailtransaksi,tbl_barang where tbl_detailtransaksi.kodetransaksi='$values[kodetransaksi]' 
        AND tbl_detailtransaksi.kodebarang=tbl_barang.kodebarang";
        $getb=mysqli_query($koneksi,$qqq1);
        while($rx1=mysqli_fetch_array($getb)){ 
          echo ' - '.$rx1['jumlahbarang'].' '.$rx1['satuan'].'<br>';
        } 
        ?>
  </th>
</tr>
<?php
}
 ?>
</table>
<br>
<table border="0">
  <tr>
    <td style="width: 30%" colspan="3"><?php echo TanggalIndo(date('Y-m-d')); ?></td>
  </tr>
  <tr>
    <td style="width: 40%" colspan="2">MENGETAHUI</td>
  </tr>
  <tr>
    <td style="width: 30%;height: 90px"></td>
  </tr>
  <tr>
    <td style="width: 30%"></td>
  </tr></table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Laporan Penjualan".date('d-m-Y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(18, 15, 20, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>