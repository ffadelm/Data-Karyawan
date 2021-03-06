<!-- Copyright © faysal fadel maulana 20190140097 -->

<?php
include './config.php';
$id = $_GET['id_karyawan'];
$karyawan = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
while ($data = mysqli_fetch_assoc($karyawan)) {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <title><?php echo $data['nama'] ?></title>
    </head>
    <!-- Copyright © faysal fadel maulana 20190140097 -->
    <!-- data print start -->

    <body onload="window.print();">
        <div class="container mt-5">
            <p class=".fs-1 fw-bold">Profil Karyawan</p>
            <img src="./images/user.png" class="rounded">
            <p class="mt-4">Nama : <?php echo $data['nama'] ?></p>
            <p>Nomor KTP : <?php echo $data['no_ktp'] ?></p>
            <p>Nomor Telepon : <?php echo $data['no_telp'] ?></p>
            <p>Tahun Masuk : <?php echo $data['th_masuk'] ?></p>
            <p>Lama Kerja : <?php $awal = date_create($data['th_masuk']);
                            $akhir = date_create();
                            $diff = date_diff($awal, $akhir);
                            echo $diff->y . ' tahun, ';
                            echo $diff->m . ' bulan' ?></p>
        </div>
    <?php
}
    ?>
    <!-- data print end -->
    <!-- Copyright © faysal fadel maulana 20190140097 -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>
    <!-- Copyright © faysal fadel maulana 20190140097 -->