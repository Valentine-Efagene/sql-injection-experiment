<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">

        <h1>SQL INJECTION EXPERIMENT</h1>

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

    </div>
</body>

</html>