<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$relasiID = $_POST['relasi_id'];
$judul = $_POST['buku'];
$kategori = $_POST['kategori'];

$sql = "UPDATE kategoribuku_relasi SET BukuID='$judul',KategoriID='$kategori' WHERE KategoriBukuID='$relasiID'";
$edit = $koneksi->query($sql);  

if ($edit) {
    header("Location:../index.php?halaman=kategoribuku_relasi");
}



?>