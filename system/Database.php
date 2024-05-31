<?php
class Database
{
    protected $koneksi;
    protected string $hostname;
    protected string $username;
    protected string $password;
    protected string $database;

    public function connect()
    {
        $koneksi = new mysqli('localhost','root','','digitallibrary');
        if($koneksi->connect_errno){
            die('Terjadi kesalahan pada koneksi database '
            .$koneksi->connect_error);
        }
        $this->koneksi = $koneksi;
        return $koneksi;
    }
}