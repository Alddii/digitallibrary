<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $relasiID = $_GET['id'];

    $sql = "DELETE FROM kategoribuku_relasi WHERE KategoriBukuID='$relasiID'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=kategoribuku_relasi");
    }
?>
