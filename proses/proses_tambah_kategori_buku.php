<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $nama_kategori_buku = $_POST['nama_kategori_buku'];

    $sql = "INSERT INTO kategoribuku VALUES (null,'$nama_kategori_buku')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=kategori_buku");
    }

?>
