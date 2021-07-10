<?php
require('class.database.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['username'])) {
        if (isset($_POST['password'])) {
            $username = $database->escape($_POST['username']);
            $password = $database->escape($_POST['password']);

            $sql = "SELECT * FROM admin WHERE username='$username'";
            $results = $database->select($sql);
            if (is_array($results) && count($results) > 0) {
                $password_hash = $results[0]['password'];
                if ($password_hash == md5($password)) {
                    // Username & password correct
                    session_start();
                    $_SESSION['id_admin'] = $results[0]['id_admin'];
                    header('location:home.php');
                } else $ermsg = "Password salah !";
            } else $ermsg = "Username tidak ditemukan !";
        } else $ermsg = "Password kosong !";
    } else $ermsg = "Username kosong !";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- favicon top -->
    <link rel="icon" href="images/favicon.png" type="image/ico" />

    <!-- Css Login -->
    <link rel="stylesheet" href="style/login.css">
    <title>Login Admin</title>
</head>

<body class="bg-primary">

    <div class="container ">
        <?php
        if (isset($ermsg) && !empty($ermsg)) {
            echo '<div class="alert alert-danger" role="alert">' . $ermsg . '</div>';
        }
        ?>
        <div class="row justify-content-center mt-5">
            <div class="col-sm-8 col-md-6 col-lg-4 bg-white rounded p-4 shadow mt-5">
                <div class="card-header rounded">
                    <div class="logo fas fa-user-circle  mt-4 mb-5"></div>
                    <h3>Login Admin</h3>
                    <p class="text-primary">PT Sawit Makmur Abadi</p>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group mb-4">
                            <input type="submit" name="submit" value="Login" class="btn btn-primary float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>