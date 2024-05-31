<?php

class User extends Database {

    protected string $table = 'user';

    public function __construct()
    {
        $this->connect();
        
    }

    public function getUsers(): array
    {
        $koneksi = $this->koneksi;
        $sql     = "SELECT * FROM $this->table";
        $query   = $koneksi->query($sql);
        $result  = [];
        foreach($query as $row)
        {
            $result[] = $row;
        }
        return $result;
    }


    public function getUserByUsername(string $username): array
    {
        $koneksi = $this->koneksi;
        $sql     = "SELECT * FROM $this->table WHERE username = '$username' OR email = '$username'";
        $query   = $koneksi->query($sql);
        return $query->fetch_assoc();
    }

    public function checkIsUserRegistered(string $username, string $email): bool
    {
        $koneksi = $this->koneksi;
        $sql     = "SELECT * FROM $this->table WHERE username = '$username' OR email = '$email'";
        $query   = $koneksi->query($sql);
        if($query->num_rows == 1){
            return true;
        }
        return false;
    }

    public function createUser(array $data): bool
    {
        $koneksi = $this->koneksi;

        $username       = $data['username'];
        $email          = $data['email'];
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $namaLengkap    = $data['nama_lengkap'];
        $alamat         = $data['alamat'];
        $level          = $data['level'];

        $sql   = "INSERT INTO $this->table VALUES (null, ?, ?, ?, ?, ?, ?)";
        $query = $koneksi->prepare($sql);
        $query->bind_param('ssssss', $username, $hashedPassword, $email, $namaLengkap, $alamat, $level);
        $query->execute();
        if($query->affected_rows > 0){
            return true;
        }
        return false;
    }

    public function updateUser(string $id, string $data)
    {
        //
    }

    public function deleteUser(string $id)
    {
        //
    }
}

