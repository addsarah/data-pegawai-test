<?php

session_start();

include 'koneksi.php';

$nama_pegawai		= $_POST['nama_pegawai'];
$password	= $_POST['password'];

$data	= mysqli_query($koneksi,"select * from tb_user where nama_pegawai='$nama_pegawai' and password='$password'");

$cek = mysqli_num_rows($data);

if(!ISSET($_SESSION['username'])) {

	$row = mysqli_fetch_assoc($data);
	$_SESSION['nama_pegawai'] = $nama_pegawai;
	$_SESSION['level'] = $row['nama_pegawai'];
	$_SESSION['status'] = "login";

	
	if($row['level']=="1"){
		header("location:daftar-pegawai/home.php");
	}else{
		header("location:daftar-pegawai/home.php");
	}
}else{
	header("location:index.php?pesan=gagal");
}

?>