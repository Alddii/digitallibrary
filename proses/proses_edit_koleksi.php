<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$koleksiID = $_POST['koleksi_id'];
$peminjam = $_POST['peminjam'];
$buku = $_POST['buku'];

$sql = "UPDATE koleksipribadi SET UserID='$peminjam',BukuID='$buku' WHERE KoleksiID='$koleksiID'";
$edit = $koneksi->query($sql);  

if ($edit) {
    header("Location:../index.php?halaman=koleksi");
}



?>