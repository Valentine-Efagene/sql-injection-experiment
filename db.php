<?php
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'robinsnest'; // Modify these...
$dbuser = 'robinsnest'; // ...variables according
$dbpass = 'rnpassword'; // ...to your installation
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
    echo "Table '$name' created or already exists.<br>";
}
