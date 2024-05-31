<?php

class UserController {

    public function register($data): array
    {
        $user = new User();
        $userTerdaftar = $user->checkIsUserRegistered($data['username'], $data['email']);
        if(!$userTerdaftar){
            $createUser = $user->createUser($data);
            if($createUser){
                return ['status' => true, 'message' => 'Berhasil mendaftar akun!'];
            }
        } else {
            return ['status' => false, 'message' => 'Username atau Email sudah terdaftar'];
        }
    }

    public function login(string $username, string $password): array
    {
        $user = new User();
        $userTerdaftar = $user->checkIsUserRegistered($username, $username);
        if($userTerdaftar){
            $getUser = $user->getUserByUsername($username);
            if(password_verify($password, $getUser['Password'])){
                $dataSession = [
                    'UserID' => $getUser['UserID'],
                    'Username' => $getUser['Username'],
                    'Level' => $getUser['Level'],
                ];
                $this->setUserSession($dataSession);
                return ['status' => true, 'message' => 'Berhasil login!'];
            } else {
                return ['status' => false, 'message' => 'Password yang anda masukan salah!'];
            }
        } else {
            return ['status' => false, 'message' => 'Username atau Email yang anda masukan tidak terdaftar!'];
        }
    }

    public function logout(): array
    {
        $this->deleteUserSession();
        return ['status' => true, 'message' => 'Berhasil logout!'];
    }

    public function setUserSession(array $data): void
    {
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['Username'] = $data['Username'];
        $_SESSION['Level'] = $data['Level'];
    }

    public function deleteUserSession(): void
    {
        session_destroy();
    }


    public function update(array $data)
    {
        //
    }

    public function delete(string $id)
    {
        //
    }

}