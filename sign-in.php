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
$query = "SELECT email FROM users WHERE username='$username' AND password_hash='$password_hash'";
//die($query);

$result = queryMysql($query);

if ($result->num_rows == 0) {
    $error = "Invalid login attempt";
    die($error);
} else {
    $user = $result->fetch_assoc();
    //die(json_encode($user));
    $email = $user['email'];
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
}

header('Location: ' . 'http://localhost/nedu/index.php');
die();
