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

    <title>Sistem Informasi PT Sawit Makmur Abadi</title>
</head>

<body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Sistem Informasi PT Sawit Makmur Abadi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="index.php">Data Karyawan</a>
                    <a class="nav-link" href="logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- modal start -->
    <div class="container data-karyawan mt-5">
        <!-- modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data
        </button>

        <!-- Modal tambah data-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- membuat form dengan method post untuk memanggil file store.php -->
                    <form method="post" action="store.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Input Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- input nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" required>
                            </div>
                            <!-- input no ktp -->
                            <div class="mb-3">
                                <label for="no_ktp" class="form-label">Nomor KTP</label>
                                <input type="text" class="form-control" id="no_ktp" placeholder="Masukkan Nomor KTP" name="no_ktp" required>
                            </div>
                            <!-- input alamat -->
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" required></input>
                            </div>
                            <!-- input tahun masuk -->
                            <div class="mb-3">
                                <label for="th_masuk" class="form-label">Tahun Masuk</label>
                                <input type="text" class="form-control" id="th_masuk" placeholder="Masukkan Tahun Masuk" name="th_masuk" required></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Button close modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Button tambah data  -->
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <!-- Table start  -->
    <div class="container data-karyawan mt-5">
        <table class="table table-striped" id="tableKaryawan">
            <thead>
                <tr>
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
                            echo $diff->m. ' bulan'?></td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fbfbfb; background-color: #1abb65">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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