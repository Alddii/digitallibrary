<?php

include 'koneksi.php';

$username    = (string) readline('Masukkan Username: ');
$email       = (string) readline('Masukkan Email: ');
$password    = (string) readline('Masukkan Password: ');
$namaLengkap = (string) readline('Masukkan Nama Lengkap: ');
$alamat      = (string) readline('Masukkan Alamat: ');
$level       = (string) readline('Masukkan Level (ADMINISTRATOR/PETUGAS): ');

echo 'Memproses data...';

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$stmt = $koneksi->query("INSERT INTO user VALUES (NULL, '$username', '$passwordHash', '$email', '$namaLengkap', '$alamat', '$level')");
if($stmt > 0){
    echo ' Berhasil input data User';
} else {
    echo ' Gagal! '.$koneksi->error;
}