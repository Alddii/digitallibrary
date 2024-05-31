<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $UlasanID = $_GET['id'];

    $sql = "DELETE FROM ulasan_buku WHERE UlasanID ='$UlasanID'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=ulasan");
    }
?>
