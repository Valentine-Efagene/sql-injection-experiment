<?php
require_once 'db.php';

$email = null;
$username = null;
$role = null;
$password = null;

createTable(
    'users',
    'username VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    role ENUM("User", "Admin"),
    password_hash VARCHAR(255),
    PRIMARY KEY (username)',
);

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['role'])) {
    $role = $_POST['role'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$password_hash = hash('ripemd128', $password);

createUser(new User($username, $email, $role, $password_hash));
header('Location: ' . '/nedu/');
die();
