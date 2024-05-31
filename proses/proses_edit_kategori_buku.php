<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$kategoriID = $_POST['kategori_id'];
$nama_kategori = $_POST['kategori_buku'];

$sql = "UPDATE kategoribuku SET NamaKategori='$nama_kategori' WHERE KategoriID='$kategoriID'";
$update = $koneksi->query($sql);

if ($update) {
    header("Location:../index.php?halaman=kategori_buku");
}
?>
