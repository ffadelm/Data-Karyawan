<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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

    <title>Edit Profil Karyawan</title>
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

    <!-- edit start -->
    <?php
    include 'config.php';
    $id = $_GET['id_karyawan'];
    $karyawan = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
    while ($data = mysqli_fetch_assoc($karyawan)) {
    ?>
        <div class="profile container mt-5">
            <p><a href="index.php">Home</a>/ Edit Profil Karyawan / <?php echo $data['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Edit Profil Karyawan</p>
                </div>
                <div class="card-body fw-bold">
                    <form method="post" action="update.php">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">Nomor KTP</label>
                            <input type="text" class="form-control" id="no_ktp" placeholder="Masukkan Nomor KTP" name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="<?php echo $data['no_telp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="th_masuk" class="form-label">Tahun Masuk</label>
                            <input type="date" class="form-control" id="th_masuk" placeholder="Masukkan Tahun Masuk (yyyy-mm-dd)" name="th_masuk" value="<?php echo $data['th_masuk']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- edit end -->

    <footer class="application-footer mt-5 mb-3">
        <div class="container">
            <center>Sistem Informasi PT Sawit Makmur Abadi <br>
                Copyright © faysal fadel maulana <br> 2021</Copyright>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>