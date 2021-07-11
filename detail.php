<!-- Copyright © faysal fadel maulana 20190140097 -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- css stylesheet bootstrap assets  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- favicon top -->
    <link rel="icon" href="images/favicon.png" type="image/icon" />

    <!-- styling responsive -->
    <style>
        @media (min-device-width: 375px) and (max-device-width: 1024px) {
            .textNav {
                font-size: 17px;
            }
        }
        .profile {
            padding-top: 50px;
        }
    </style>

    <title>Detail Karyawan</title>
</head>

<body>
    <!-- nav start -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="textNav navbar-brand fw-bold" href="index.php">Sistem Informasi PT Sawit Makmur Abadi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="index.php">Data Karyawan</a>
                    <a class="nav-link" href="#">Perkebunan</a>
                    <a class="nav-link" href="#">Penghasilan</a>
                    <a class="nav-link" href="logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- detail start -->
    <?php
    include 'config.php';
    $id = $_GET['id_karyawan'];
    $karyawan = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
    while ($data = mysqli_fetch_assoc($karyawan)) {
    ?>
        <div class="profile container mt-5">
            <p><a href="index.php">Home</a>/ Detail Karyawan / <?php echo $data['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil Karyawan</p>
                </div>
                <div class="card-body fw-bold">
                    <img src="./images/user.png" class="rounded">
                    <p class="mt-4">Nama : <?php echo $data['nama'] ?></p>
                    <p>No. KTP : <?php echo $data['no_ktp'] ?></p>
                    <p>No. Telp : <?php echo $data['no_telp'] ?></p>
                    <p>Tahun Masuk : <?php echo $data['th_masuk'] ?></p>
                    <p>Lama Kerja : <?php $awal = date_create($data['th_masuk']);
                                    $akhir = date_create();
                                    $diff = date_diff($awal, $akhir);
                                    echo $diff->y . ' tahun, ';
                                    echo $diff->m . ' bulan' ?></p>

                    <a href="print.php?id_karyawan=<?php echo $data['id_karyawan']; ?>" class="btn btn-primary text-white ">CETAK</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- detail end -->

    <!-- Copyright © faysal fadel maulana 20190140097 -->
    <!-- footer start  -->
    <footer class="application-footer mt-5 mb-3">
        <div class="container">
            <center>Sistem Informasi PT Sawit Makmur Abadi <br>
                Copyright © faysal fadel maulana <br> 2021</Copyright>
        </div>
    </footer>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
<!-- Copyright © faysal fadel maulana 20190140097 -->