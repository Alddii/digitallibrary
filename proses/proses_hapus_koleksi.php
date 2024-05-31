<?php
    require '../system/Database.php';
	$db = new Database();
	$koneksi = $db->connect();

    $koleksiID = $_GET['id'];

    $sql = "DELETE FROM koleksipribadi WHERE KoleksiID ='$koleksiID'";
    $delete= $koneksi->query($sql);

    if ($delete) {
        header("Location:../index.php?halaman=koleksi");
    }
?>
