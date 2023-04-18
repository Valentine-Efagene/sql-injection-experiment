<?php
session_start();
class User
{
    public string $email;
    public string $username;
    public string $password_hash;

    public function __construct(string $username, string $email, string $password_hash)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password_hash = $password_hash;
    }
}
