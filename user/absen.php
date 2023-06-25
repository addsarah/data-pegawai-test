<?php
date_default_timezone_set('asia/jakarta');
session_start();
require('../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $tgl = date('Y-m-d');
    if($_GET['a'] == 'M'){
        $karyawan = $_SESSION['id'];
        $w_masuk = new DateTime("08:00");
        $now = new DateTime();
        $a_masuk = date("H:i");
        // $a_masuk = "07:00";
        $j = $now->diff($w_masuk)->h;
        $m = $now->diff($w_masuk)->i;
        if($now < $w_masuk){
            $late = "0.0";
        }else{
            $late = $j.'.'.$m;
        }
        $query = mysqli_query($koneksi, "INSERT INTO absensi(karyawan,masuk,terlambat,tgl_absen) VALUES('$karyawan','$a_masuk','$late','$tgl')");
        if ($query) {
            header('location: index.php');
        }
    }else if($_GET['a'] == 'P'){
        $k = $_SESSION['id'];
        $w_pulang = new DateTime("17:00");
        $now = new DateTime();
        $a_pulang = date("H:i");
        $j = $now->diff($w_pulang)->h;
        $m = $now->diff($w_pulang)->i;
        
        if($now < $w_pulang){
            $over = 0.0;
        }else{
            $over = $j.'.'.$m;
        }
        // print($over);die;
        $query = mysqli_query($koneksi, "UPDATE absensi SET pulang = '$a_pulang', lembur = '$over' WHERE karyawan = '$k' AND tgl_absen = '$tgl'");
        if ($query) {
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
}else{
    header('location: index.php');
}