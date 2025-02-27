<?php
session_start();
if (isset($_SESSION['UserID'])) {
  header ('Location:index.php?halaman=dashboard');
}
require 'system/Database.php';
require 'models/User.php';
require 'controllers/UserController.php';

if(isset($_POST['submit'])){
    $data = [
        'nama_lengkap'  => $_POST['nama_lengkap'],
        'username'      => $_POST['username'],
        'email'         => $_POST['email'],
        'password'      => $_POST['password'],
        'alamat'        => $_POST['alamat'],
        'level'         => 'PEMINJAM'
    ];

    $userController = new UserController();
    $register = $userController->register($data);
    if($register['status']){
        header('Location: login.php');
    } else {
        echo $register['message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Digital Library || Register</title>

  <!-- Favicons -->
  <link href="assets/img/pp.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/pp.png" alt="">
                  <span class="d-none d-lg-block">Register</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukan data lengkap anda</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Alamat</label>
                      <div class="input-group has-validation">
                        <input type="text" name="alamat" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <button name="submit" class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                  &copy; Copyright <strong><span>A. Pratama</span></strong>. All Rights Reserved
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script srassets/js/main.js"></script>

</body>

</html>