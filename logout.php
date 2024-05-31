<?php
session_start();
require 'system/Database.php';
require 'models/User.php';
require 'controllers/UserController.php';

$userController = new UserController();
$logout = $userController->logout();
if($logout['status']){
    header('Location: login.php');
} else {
    echo $logout['message'];
}