<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header ('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - Digital Library</title>

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
</head>

<body class="bg-body-secondary">

<!-- ======= Header ======= -->
<?php require_once 'views/template/header.php' ?>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<?php require_once 'views/template/sidebar.php' ?>
<!-- End Sidebar-->

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <?php
            if(isset($_GET['halaman'])){
                $halaman = $_GET['halaman'];
                if (file_exists("views/$halaman.php")) {
                    require 'system/Database.php';
                    require_once "views/$halaman.php";
                }else{
                    require_once 'views/404.php';
                }
            }
            ?>

        </div>
    </section>

</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once 'views/template/footer.php' ?>
<!-- End Footer -->

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>