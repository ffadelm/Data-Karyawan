<!-- Copyright © faysal fadel maulana 20190140097 -->

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

    <!-- favicon -->
    <link rel="icon" href="images/favicon.png" type="image/ico" />

    <!-- css stylesheet bootstrap assets  -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- styling responsive -->
    <style>
        @media (min-device-width: 375px) and (max-device-width: 1024px) {
            .textNav {
                font-size: 17px;
            }

            .icsawit {
                width: 200px;
                height: 120px;
                padding-top: 20px;
            }

            font {
                font-size: 20px;
            }

            footer {
                font-size: 13px;
            }
        }
    </style>

    <title>Sistem Informasi PT Sawit Bahagia</title>
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
    <!-- home start -->
    <div class="container">
        <center><br><br>
            <img class="icsawit mt-5" src="images/ptsawit.jpg" width="400px" height="200px" /> <br><br><br>
            <font Size="6" face="Helvetica">Selamat Datang di </font> <br>
            <font Size="6" face="Helvetica">Sistem Informasi Staff PT Sawit Makmur Abadi</font> <br>
        </center>

        <!-- carousel start -->
        <div class="bd-example mt-5 mb-5">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://image.freepik.com/free-photo/palm-trees-palm-oil-plantation-south-east-asia_181624-6050.jpg" class="d-block w-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Pohon Kelapa Sawit</h3>
                            <p>Pohon kelapa sawit di monitoring setiap saat agar dapat menghasilkan buah yang berkualitas.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://image.freepik.com/free-photo/aerial-view-palm-trees-palm-oil-plantation-south-east-asia_181624-18842.jpg" class="d-block w-100 rounded" alt="...">
                        <div class=" carousel-caption d-none d-md-block">
                            <h3>Kebun Seperti Keluarga</h3>
                            <p>Kebun dirawat dan di jaga seperti keluarga.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/free-photo/fresh-oil-palm-fruits-cooking-palm-oil-palm-leaves-wooden-background_192913-290.jpg?size=338&ext=jpg" class="d-block w-100 rounded" alt="...">
                        <div class=" carousel-caption d-none d-md-block">
                            <h3>Minyak Kelapa Sawit</h3>
                            <p>Minyak kelapa sawit yang di produksi memiliki kualitas tinggi dan sehat untuk di gunakan.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- carousel end -->
    </div>
    <!-- home end -->

    <!-- Copyright © faysal fadel maulana 20190140097 -->

    <!-- footer start -->
    <footer class="application-footer mt-3 mb-5">
        <div class="container">
            <center>Sistem Informasi PT Sawit Makmur Abadi <br>
                Copyright © faysal fadel maulana <br> 2021</Copyright>
        </div>
    </footer>
    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>
<!-- Copyright © faysal fadel maulana 20190140097 -->