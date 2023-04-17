<?php
require_once 'db.php';

$email = null;
$username = null;
$password = null;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$password_hash = hash('ripemd128', $password);

createUser(new User($username, $email, $password_hash));
header('Location: ' . 'http://localhost/nedu/index.php');
die();
