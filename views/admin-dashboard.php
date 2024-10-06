<?php
require_once 'db.php';

$isAdmin = isset($_SESSION['role']) && ($_SESSION['role'] == 'admin');

if (!$isAdmin) {
    header('Location: ' . '/injection/dashboard');
    die();
}

$current_email = null;
$current_username = null;

if (isset($_SESSION['email'])) {
    $current_email = $_SESSION['email'];
}

if (isset($_SESSION['username'])) {
    $current_username = $_SESSION['username'];
}

function toUserObjects($user_assoc_array)
{
    return new User(
        $user_assoc_array['username'],
        $user_assoc_array['email'],
        $user_assoc_array['role'],
        $user_assoc_array['password_hash'],
    );
}

$result = getAllUsers();
$_users = $result->fetch_all(MYSQLI_ASSOC);

$users = array_map("toUserObjects", $_users);
?>

<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">

        <h1>DASHBOARD</h1>
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
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        echo "
                    <tr>
                        <td>$user->email</td>
                        <td>$user->username</td>
                        <td>$user->role</td>
                    </tr>
                    ";
                    }
                    ?>
                </tbody>
            </table>
        </section>;
    </div>
</body>

</html>