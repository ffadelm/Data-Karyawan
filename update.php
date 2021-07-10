<?php
//include con database
include './config.php';

$id = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$no_ktp = $_POST['no_ktp'];
$no_telp = $_POST['no_telp'];
$th_masuk = $_POST['th_masuk'];


mysqli_query($koneksi, "update karyawan set nama='$nama', no_ktp = '$no_ktp', no_telp = '$no_telp', th_masuk = '$th_masuk' where id_karyawan = '$id'");
header("location: index.php");
?>