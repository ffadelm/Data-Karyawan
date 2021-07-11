<!-- Copyright © faysal fadel maulana 20190140097 -->
<?php
include 'config.php';

$id = $_GET['id_karyawan'];

mysqli_query($koneksi, "delete from karyawan where id_karyawan ='$id'");

header("location: index.php");

?>
<!-- Copyright © faysal fadel maulana 20190140097 -->