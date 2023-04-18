<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/views/index.php';
        break;

    case '/nedu':
    case '/nedu/':
    case '/nedu/resource':
        require __DIR__ . '/views/resource.php';
        break;

    case '/nedu/sign-in':
        require __DIR__ . '/views/sign-in.php';
        break;

    case '/nedu/sign-up':
        require __DIR__ . '/views/sign-up.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
