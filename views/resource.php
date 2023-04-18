<?php
require_once 'user.php';
require_once 'db.php';

$current_email = null;
$current_username = null;

if (isset($_SESSION['email'])) {
    $current_email =  $_SESSION['email'];
}

if (isset($_SESSION['username'])) {
    $current_username =  $_SESSION['username'];
}

createTable(
    'users',
    'username VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    password_hash VARCHAR(255),
    PRIMARY KEY (username)',
);

function toUserObjects($user_assoc_array)
{
    return new User(
        $user_assoc_array['username'],
        $user_assoc_array['email'],
        $user_assoc_array['password_hash'],
    );
}

$result = getAllUsers();
$_users = $result->fetch_all(MYSQLI_ASSOC);

$users = array_map("toUserObjects", $_users);
?>

<html>

<head>
    <title>SQL Injection Experiment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">

        <h1>SQL INJECTION EXPERIMENT</h1>
        <div class="profile">
            <h2>Current User:</h2>
            <p>Username: <?php
                            echo $current_username;
                            ?></p>
            <p>Email: <?php
                        echo $current_email;
                        ?></p>
        </div>

        <section>
            <h2>USERS</h2>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password Hash</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        echo "
                <tr>
                    <td>$user->email</td>
                    <td>$user->username</td>
                    <td>$user->password_hash</td>
                </tr>
                ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>