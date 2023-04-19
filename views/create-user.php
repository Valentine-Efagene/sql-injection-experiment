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
            <form method="post" action="/nedu/store-user">
                <label>
                    Username
                    <input required class="input" type="text" name="username" id="username" placeholder="Username">
                </label>
                <label>
                    Email
                    <input required class="input" type="email" name="email" id="email" placeholder="Email">
                </label>
                <select name="role" id="role">
                    <option selected value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <label>
                    Password
                    <input required class="input" type="password" name="password" id="password" placeholder="Password">
                </label>
                <input class="btn" type="submit">
            </form>
        </section>
    </div>
</body>

</html>