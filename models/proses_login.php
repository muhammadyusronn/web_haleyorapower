<?php
session_start();
if (isset($_POST['login'])) {
  include 'config.php';
  include 'tabel_database.php';
  $pass=md5($_POST['password']);
  $x=tabel_admin();
  $sql="SELECT * from $x where username='$_POST[username]' and password='$pass'";
  $exc=mysqli_query($koneksi,$sql);
  if (mysqli_num_rows($exc)>=1) {
    while ($rows=mysqli_fetch_array($exc)) {
      $_SESSION['username']=$rows['username'];
      $_SESSION['nama']=$rows['nama'];
      $_SESSION['alamat']=$rows['alamat'];
      $_SESSION['nomorhp']=$rows['nomorhp'];
      $_SESSION['level']=$rows['level'];
    }
    echo "<script>alert('Login berhasil! Selamat Datang ".$_SESSION['nama']."');window.location='../index.php'</script>";
  }else{
    echo "<script>alert('Masukkan username dan password dengan benar!');window.location='../login.html'</script>";
  }
} ?>