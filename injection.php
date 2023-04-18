<?php
require_once 'db.php';

$email = null;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$password_hash = hash('ripemd128', $password);

$result = queryMysql("SELECT email FROM users WHERE username='$username' AND password_hash='$password_hash'");

if ($result->num_rows == 0) {
    $error = "Invalid login attempt";
    echo $error;
} else {
    $user = $result->fetch_assoc();
    $email = $user['email'];
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
}

header('Location: ' . 'http://localhost/nedu/index.php');
die();
