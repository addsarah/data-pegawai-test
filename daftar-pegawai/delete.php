<?php 
include("header.php");
include("../koneksi.php");
?>

<?php

$id_db_pegawai = $_GET['id'];

$query_delete = "delete from tb_pegawai where no= '$id_db_pegawai'";

$query_delete_ok = mysqli_query($connect,$query_delete);

if ($query_delete_ok){
	
	header("location: http://localhost/input_data_karyawan/daftar-pegawai/home.php?status=SuksesDelete");
}else{
	header("location: http://localhost/input_data_karyawan/daftar-pegawai//home.php?status=GagalDelete");
}

?>