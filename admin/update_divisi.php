<?php
require('../setup/koneksi.php');
$id = $_GET['id'];
$divisi = $_POST['divisi'];
$query = mysqli_query($koneksi,"UPDATE divisi SET nama_divisi='$divisi' WHERE id_divisi = '$id'");
if($query){
    header('location: divisi.php');
}else{
    echo"<script>alert('gagal');window.history.back()</script>";
}