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
    <div class="container">

        <h1>SQL INJECTION EXPERIMENT</h1>
        <h2>Current User:
            <?php
            echo $current_email;
            ?></h2>
        <section>
            <h2>CREATE USER</h2>
            <form method="post" action="sign-up.php">
                <label>
                    Email
                    <input required class="input" type="email" name="email" id="email" placeholder="Email">
                </label>
                <label>
                    Username
                    <input required class="input" type="text" name="username" id="username" placeholder="Username">
                </label>
                <label>
                    Password
                    <input required class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <input class="btn" type="submit">
            </form>

            <form action="session-destroy.php">
                <input class="btn--secondary" value="Clear Session" type="submit">
            </form>
        </section>
        <hr>

        <section>
            <h2>LOG IN</h2>
            <form method="post" action="sign-in.php">
                <label>
                    Username
                    <input class="input" type="text" name="username" id="username" placeholder="Username">
                </label>
                <label>
                    Password
                    <input class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <input class="btn" type="submit">
            </form>
        </section>
        <hr>

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