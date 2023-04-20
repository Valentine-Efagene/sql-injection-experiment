<?php

require_once 'db.php';

$isSaved = false;

$email = null;
$username = null;
$role = null;
$password = null;

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

if ($username && $password & $role) {
    $password_hash = hash('ripemd128', $password);
    $result = createUser(new User($username, $email, $role, $password_hash));
    $isSaved = $result;
}

?>

<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">
        <h1>SQL INJECTION EXPERIMENT</h1>
        <section>
            <h2>CREATE USER</h2>
            <form method="post" action="/nedu/create-user">
                <label>
                    Username
                    <input required class="input" type="text" name="username" id="username" placeholder="Username">
                </label>
                <label>
                    Email
                    <input required class="input" type="email" name="email" id="email" placeholder="Email">
                </label>
                <label>
                    Role
                    <select name="role" id="role">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </label>
                <label>
                    Password
                    <input required class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <?php
                echo $isSaved ? '<h2 class="create-user-feeback">Created!</h2>' : '';
                ?>
                <input class="btn" type="submit">
            </form>
        </section>
    </div>
</body>

</html>