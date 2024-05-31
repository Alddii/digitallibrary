<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $kategoriID = $_GET['id'];

    $sql = "DELETE FROM kategoribuku WHERE KategoriID='$kategoriID'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=kategori_buku");
    }
?>
