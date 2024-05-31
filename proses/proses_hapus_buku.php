<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $bukuID = $_GET['id'];

    $sql = "DELETE FROM buku WHERE BukuID='$bukuID'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=buku");
    }
?>
