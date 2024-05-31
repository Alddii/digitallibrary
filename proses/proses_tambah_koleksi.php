<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $user = $_POST['user'];
    $buku = $_POST['buku'];

    $sql = "INSERT INTO koleksipribadi VALUES (NULL, '$user', '$buku')";
    $insert = $koneksi->query($sql);

    if ($insert) {
        header("Location:../index.php?halaman=koleksi");
    }

?>
