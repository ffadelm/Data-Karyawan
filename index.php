<?php
session_start();
// if the user is not logged in, then redirect to the logout page
if (!isset($_SESSION["id_admin"])) {
    header("location: login.php");
    exit();
}
?>

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
    <link rel="icon" href="images/favicon.png" type="image/ico" />

    <!-- css stylesheet bootstrap assets  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- styling responsive -->
    <style>
        @media (min-device-width: 375px) and (max-device-width: 1024px) {
            .textNav {
                font-size: 17px;
            }
        }

        .textTop{
            padding-top: 50px;
            font-size: 30px;
        }
    </style>

    <title>Sistem Informasi PT Sawit Makmur Abadi</title>
</head>

<body class="mb-5">
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


    <!-- button tambah start -->
    <div class="container data-karyawan mt-5">
        <center class="textTop">
            <p class="fw-bold">DATA KARYAWAN <br> PT SAWIT MAKMUR ABADI</p>
        </center>
        <hr>
        <a href="store.php" class="btn btn-primary mb-3">Tambah Data</a>
    </div>
    <!-- button tambahl end -->

    <!-- Table start  -->
    <div class="container table-responsive data-karyawan">
        <table class="table table-striped" id="tableKaryawan">
            <thead>
                <tr class="bg-success text-white">
                    <th scope="col">No.</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">No. KTP</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Lama Kerja</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $no = 1;

                $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");

                while ($data = mysqli_fetch_array($karyawan)) {
                ?>
                    <tr>

                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['no_ktp']; ?></td>
                        <td><?php echo $data['no_telp']; ?></td>
                        <td><?php echo $data['th_masuk']; ?></td>

                        <!-- only show tahun -->
                        <!-- <td><?php echo date('Y', strtotime($data['th_masuk'])); ?></td> -->

                        <!-- tampil selisih -->
                        <td><?php $awal = date_create($data['th_masuk']);
                            $akhir = date_create();
                            $diff = date_diff($awal, $akhir);
                            echo $diff->y . ' tahun, ';
                            echo $diff->m . ' bulan' ?></td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilihan
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="./detail.php?id_karyawan=<?php echo $data['id_karyawan']; ?>">Detail</a></li>
                                    <li><a class="dropdown-item" href="./edit.php?id_karyawan=<?php echo $data['id_karyawan']; ?>">Edit</a></li>
                                    <li><a class="dropdown-item" href="./delete.php?id_karyawan=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('anda yakin akan menghapus data Karyawan ini?')">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- table end -->

    <footer class="application-footer mt-5">
        <div class="container">
            <center>Sistem Informasi PT Sawit Makmur Abadi <br>
                Copyright © faysal fadel maulana <br> 2021</Copyright>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableKaryawan').DataTable();
        });
    </script>
</body>

</html>