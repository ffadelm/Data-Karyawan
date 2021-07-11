<!-- Copyright © faysal fadel maulana 20190140097 -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <!-- favicon top -->
    <link rel="icon" href="images/favicon.png" type="image/icon" />

    <!-- css stylesheet bootstrap assets  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- styling responsive -->
    <style>
        @media (min-device-width: 375px) and (max-device-width: 1024px) {
            .textNav {
                font-size: 17px;
            }

            h2,
            body {
                padding-top: 50px;
            }
        }
        h2 {
            padding-top: 17px;
        }
    </style>

    <title>Sistem Informasi PT Sawit Makmur Abadi</title>
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
    <!-- Copyright © faysal fadel maulana 20190140097 -->

    <!-- input start -->
    <div class="container mt-5">
        <?php include('config.php'); ?>

        <center>
            <h2>Tambah Data Karyawan</h2>
        </center>
        <hr>
        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $no_ktp = $_POST['no_ktp'];
            $no_telp = $_POST['no_telp'];
            $th_masuk = $_POST['th_masuk'];

            $cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nama='$nama'") or die(mysqli_error($koneksi));

            if (mysqli_num_rows($cek) == 0) {
                $sql = mysqli_query($koneksi, "INSERT INTO karyawan VALUES('','$nama', '$no_ktp', '$no_telp', '$th_masuk')") or die(mysqli_error($koneksi));

                if ($sql) {
                    echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
                } else {
                    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Gagal, Nama Karyawan sudah terdaftar.</div>';
            }
        }
        ?>
        <!-- Copyright © faysal fadel maulana 20190140097 -->
        <div class="formData container ">
            <div class="row">
                <form action="store.php" method="post" name="form">
                    <!-- input nama -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nama" class="form-control" size="4" required>
                        </div>
                    </div>
                    <!-- input ktp -->
                    <div class="item form-group ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align-items-start">Nomor KTP</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="no_ktp" class="form-control" required>
                        </div>
                    </div>
                    <!-- input Telepon -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="no_telp" class="form-control" required>
                        </div>
                    </div>
                    <!-- input tahun -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Masuk</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="date" name="th_masuk" placeholder="(yyyy-mm-dd)" class="form-control" required>
                        </div>
                    </div>
                    <!-- Copyright © faysal fadel maulana 20190140097 -->
                    <div class="item form-group mt-4">
                        <div class="col-md-6 col-sm-6 ">
                            <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Simpan">
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- input end -->

    <footer class="application-footer mt-5">
        <div class="container">
            <center>Sistem Informasi PT Sawit Makmur Abadi <br>
                Copyright © faysal fadel maulana <br> 2021</Copyright>
        </div>
    </footer>

    <!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</body>

</html>
<!-- Copyright © faysal fadel maulana 20190140097 -->