<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $user = $_POST['user'];
    $buku = $_POST['buku'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];


    $sql = "INSERT INTO ulasan_buku VALUES (NULL, '$user', '$buku','$ulasan','$rating')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=ulasan"); 
    }

?>
