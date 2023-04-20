<?php

require_once 'db.php';

createTable(
    'users',
    'username VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        role ENUM("user", "admin"),
        password_hash VARCHAR(255),
        PRIMARY KEY (username)',
);
