<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $judul_buku = $_POST['buku'];
    $kategori_buku = $_POST['kategori'];

    $sql = "INSERT INTO kategoribuku_relasi VALUES (NULL, '$judul_buku', '$kategori_buku')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=kategoribuku_relasi");
    }

?>
