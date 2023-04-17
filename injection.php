<?php
$email = null;

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

echo $email;
