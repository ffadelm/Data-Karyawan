<?php
//include con database
include './config.php';

//mengambil data yang di kirim dari form
$nama = $_POST['nama'];
$no_ktp = $_POST['no_ktp'];
$no_telp = $_POST['no_telp'];
$th_masuk = $_POST['th_masuk'];

//input data ke database
mysqli_query($koneksi, "insert into karyawan values('','$nama', '$no_ktp', '$no_telp', '$th_masuk')");
//return ke halaman awal
header("location:./index.php");

