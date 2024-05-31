<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$ulasanID = $_POST['ulasan_id'];
$peminjam = $_POST['peminjam'];
$buku = $_POST['buku'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];

$sql = "UPDATE ulasan_buku SET UserID='$peminjam',BukuID='$buku',Ulasan='$ulasan', Rating='$rating' WHERE UlasanID='$ulasanID'";
$edit = $koneksi->query($sql);  

if ($edit) {
    header("Location:../index.php?halaman=ulasan");
}

?>