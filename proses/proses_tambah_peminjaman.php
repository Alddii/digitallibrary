<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $user = $_POST['user'];
    $buku = $_POST['buku'];
    $peminjaman = $_POST['tanggal_peminjaman'];
    $pengembalian = $_POST['tanggal_pengembalian'];
    $status = $_POST['status'];

    $sql = "INSERT INTO peminjaman VALUES (NULL, '$user', '$buku','$peminjaman','$pengembalian','$status')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=peminjaman");
    }

?>
