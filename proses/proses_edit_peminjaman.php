<?php
require '../system/Database.php';
$db = new Database();
$koneksi = $db->connect();

$peminjamanid = $_POST['peminjaman_id'];
$peminjam = $_POST['peminjam'];
$buku = $_POST['buku'];
$tanggalpeminjaman = $_POST['tanggal_peminjaman'];
$tanggalpengembalian = $_POST['tanggal_pengembalian'];
$status = $_POST['status'];

$sql = "UPDATE peminjaman SET UserID='$peminjam',BukuID='$buku',TanggalPeminjaman='$tanggalpeminjaman', TanggalPengembalian='$tanggalpengembalian', StatusPeminjaman='$status' WHERE PeminjamanID='$peminjamanid'";
$edit = $koneksi->query($sql);  

if ($edit) {
    header("Location:../index.php?halaman=peminjaman");
}



?>