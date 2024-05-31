<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $peminjamanid = $_GET['id'];

    $sql = "DELETE FROM peminjaman WHERE PeminjamanID ='$peminjamanid'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=peminjaman");
    }
?>
