<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $judul_buku = $_POST['judul_buku'];
    $kategori_buku = $_POST['kategori_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $penerbit_buku = $_POST['penerbit_buku'];
    $tahunterbit = $_POST['tahunterbit'];


    $sql = "INSERT INTO buku VALUES (NULL, '$kategori_buku', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$tahunterbit')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=buku");
    }

?>
