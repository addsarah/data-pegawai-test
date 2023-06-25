<?php 
require_once('../setup/koneksi.php');
$t1 = $_GET['t1'];
$t2 = $_GET['t2'];
$d1 = date('d-m-Y',strtotime($_GET['t1']));
$d2 = date('d-m-Y',strtotime($_GET['t2']));
$d = date('m.y',strtotime($_GET['t1']));
$query = mysqli_query($koneksi, "SELECT * FROM absensi JOIN karyawan ON absensi.karyawan = karyawan.nip JOIN divisi ON karyawan.divisi = divisi.id_divisi WHERE tgl_absen BETWEEN '$t1' AND '$t2' ORDER BY tgl_absen DESC");
$data = [];
if (mysqli_num_rows($query) > 0) {
  $no =1;
  while ($row = mysqli_fetch_array($query)) {
    $a = [
      'no' => $no++,
      'nama_karyawan'=> $row['nama_karyawan'],
      'nama_divisi'=> $row['nama_divisi'],
      'masuk'=> $row['masuk'],
      'terlambat'=> $row['terlambat'],
      'pulang'=> $row['pulang'],
      'lembur'=> $row['lembur'],
      'tgl_absen'=> $row['tgl_absen']
    ];
      array_push($data, $a);
  }
}

header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=laporan_absensi_$d.csv");
$output = fopen('php://output', 'w');
fputcsv($output, array("Laporan Absensi periode $d1 s/d $d2"));
fputcsv($output, array('No','Nama','Divisi', 'Masuk', 'Terlambat', 'Pulang','Lembur','Tanggal'));
if (count($data) > 0) {
  foreach ($data as $row) {
      fputcsv($output, $row);
  }
}

?>