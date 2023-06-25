<?php
require('../setup/koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM divisi WHERE id_divisi = '$id'");
if($query){
    header('location: divisi.php');
}else{
    echo"<script>alert('gagal');window.location='divisi.php'</script>";
}