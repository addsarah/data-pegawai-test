<?php
require('../setup/koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM karyawan WHERE nip = '$id'");
if($query){
    $user = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id'");
    if($user){
        header('location: karyawan.php');
    }
}else{
    echo"<script>alert('gagal');window.location='karyawan.php'</script>";
}