<?php
require_once 'user.php';
require_once 'db.php';
require_once 'injection.php';

$users = [
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
    new User('janedoe@gmail.com', 'Jane Doe', 'hwuhfeuwefuhwef89ry74'),
];

?>

<html>

<head>
    <title>SQL Injection Experiment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>SQL INJECTION EXPERIMENT</h1>
        <section>
            <h2>CREATE USER</h2>
            <form method="post" action="injection.php">
                <label>
                    Email
                    <input class="input" type="email" name="email" id="email" placeholder="Email">
                </label>
                <label>
                    Username
                    <input class="input" type="text" name="username" id="username" placeholder="Username">
                </label>
                <label>
                    Password
                    <input class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <input type="submit">
            </form>
        </section>
        <hr>

        <section>
            <h2>LOG IN</h2>
            <form method="post" action="login.php">
                <label>
                    Email
                    <input class="input" type="email" name="email" id="email" placeholder="Email">
                </label>
                <label>
                    Password
                    <input class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <input type="submit">
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
                        <th>Password</th>
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