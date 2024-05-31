<?php
session_start();
require '../controllers/UserController.php';
$logout = new UserController();
$logout->logout();

header('Location:../login.php')
?>