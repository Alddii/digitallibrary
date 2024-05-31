<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$bukuID = $_POST['buku_id'];
$judul = $_POST['judul_buku'];
$kategori = $_POST['kategori_buku'];
$penulis = $_POST['penulis_buku'];
$penerbit = $_POST['penerbit_buku'];
$tahunterbit = $_POST['tahunterbit'];

$sql = "UPDATE buku SET Judul='$judul',KategoriID='$kategori',Penulis='$penulis', Penerbit='$penerbit', TahunTerbit='$tahunterbit' WHERE BukuID='$bukuID'";
$edit = $koneksi->query($sql);  

if ($edit) {
    header("Location:../index.php?halaman=buku");
}



?>