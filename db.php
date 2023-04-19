<?php
require_once 'user.php';

$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'test'; // Modify these...
$dbuser = 'root'; // ...variables according
$dbpass = ''; // ...to your installation
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_error) die("Fatal Error");

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);

    if (!$result) die("Fatal Error");

    return $result;
}

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
}

function usernameIsAvailable(string $username)
{
    $result = queryMysql("SELECT * FROM users WHERE username='$username'");
    return $result;
}

function createUser(User $user_data)
{
    if (!usernameIsAvailable($user_data->username)) {
        echo "<span class='taken'>&nbsp;&#x2718; " .
            "The username '$user_data->username' is taken</span>";
        return -1;
    }

    $query = "INSERT INTO users VALUES ('$user_data->username', '$user_data->email', '$user_data->role', '$user_data->password_hash')";

    $result = queryMysql($query);
    return $result;
}

function getAllUsers()
{
    $result = queryMysql("SELECT * FROM users");
    return $result;
}
