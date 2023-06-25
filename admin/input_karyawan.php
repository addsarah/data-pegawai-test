<?php
require('../setup/koneksi.php');
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$divisi = $_POST['divisi'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
if(isset($_POST['simpan'])) {
  $qk = mysqli_query($koneksi,"INSERT INTO karyawan(nip,nama_karyawan,gender,divisi) VALUES('$nip','$nama','$gender','$divisi')");
  if($qk){
    $qu = mysqli_query($koneksi,"INSERT INTO user(id_user,username,password,level) VALUES('$nip','$username','$password','$level')");
    if($qu){
        header('location: karyawan.php');
    }
  }  
}