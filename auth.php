<?php
require_once 'db.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$password_hash = hash('ripemd128', $password);
$query = "SELECT username, email, role FROM users WHERE username='$username' AND password_hash='$password_hash'";
die($query);

$result = queryMysql($query);

if ($result->num_rows == 0) {
    $error = "Invalid login attempt";
    die($error);
} else {
    $user = $result->fetch_assoc();
    //die(json_encode($user));
    $_SESSION['username'] = $user['username'];
    ;
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
}

$isAdmin = isset($_SESSION['role']) && ($_SESSION['role'] == 'admin');

if ($isAdmin) {
    header('Location: ' . '/injection/admin-dashboard');
} else {
    header('Location: ' . '/injection/dashboard');
}

die();
