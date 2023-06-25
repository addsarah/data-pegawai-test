<?php

/*Author : Sarah & Fika*/
/*Author : SMKN 46 jakarta*/


$dbhost	= 'localhost';
$dbuser	= 'root';

$dbpass	= 'root';
$dbname	= 'dbpegawai';

$koneksi = new mysqli ($dbhost,$dbuser,$dbpass,$dbname);

if ($koneksi->connect_error) {
	die ('Mohon maaf koneksi gagal:'. $koneksi->connect_error);

}


?>