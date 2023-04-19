<?php
session_start();

class User
{

    public string $email;
    public string $username;
    public string $role;
    public string $password_hash;

    public function __construct(string $username, string $email, string $role, string $password_hash)
    {
        $this->email = $email;
        $this->username = $username;
        $this->role = $role;
        $this->password_hash = $password_hash;
    }
}
