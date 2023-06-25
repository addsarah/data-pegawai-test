<?php
require('../setup/koneksi.php');
if(isset($_POST['simpan'])){
    $divisi = $_POST['divisi'];
    $query = mysqli_query($koneksi,"INSERT INTO divisi(nama_divisi) VALUES('$divisi')");
    if($query){
        header('location: divisi.php');
    }else{
        echo"<script>alert('gagal');window.history.back()</script>";
    }
}else{

}