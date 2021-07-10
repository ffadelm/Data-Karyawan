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

    <title>Sistem Informasi PT Sawit Bahagia</title>
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

    <!-- home start -->
    <center><br><br><br><br><br><br>
        <img src="images/ptsawit.jpg" width="400px" height="200px" /> <br><br><br>
        <font Size="6" face="Helvetica">Selamat Datang di </font> <br>
        <font Size="6" face="Helvetica">Sistem Informasi Data Karyawan</font> <br>
        <font Size="6">PT Sawit Makmur Abadi</font>
    </center>
    <!-- home end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>