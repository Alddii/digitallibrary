<?php
    require '../system/Database.php';
    session_start();
	$db = new Database();
	$koneksi = $db->connect();

    $bukuID = $_POST['id_buku'];
    $userID = $_SESSION['UserID'];
    $peminjaman = $_POST['tanggal_dipinjam'];
    $pengembalian = $_POST['tanggal_dikembalikan'];
    $status = 'Aktif';

    $sql = "INSERT INTO peminjaman VALUES (NULL, '$userID', '$bukuID','$peminjaman','$pengembalian','$status')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=peminjaman_peminjam");
    }

?>
