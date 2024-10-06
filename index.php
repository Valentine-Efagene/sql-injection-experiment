<?php

require_once 'setup.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/views/index.php';
        break;

    case '/injection':
    case '/injection/':
    case '/injection/home':
        require __DIR__ . '/views/dashboard.php';
        break;

    case '/injection/store-user':
        require __DIR__ . '/store-user.php';
        break;

    case '/injection/sign-in':
        require __DIR__ . '/views/sign-in.php';
        break;

    // Pages

    case '/injection/create-user':
        require __DIR__ . '/views/create-user.php';
        break;

    case '/injection/dashboard':
        require __DIR__ . '/views/dashboard.php';
        break;

    case '/injection/admin-dashboard':
        require __DIR__ . '/views/admin-dashboard.php';
        break;

    case '/injection/auth':
        require __DIR__ . '/auth.php';
        break;

    case '/injection/session-destroy':
    case '/injection/session-destroy?':
        require __DIR__ . '/session-destroy.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
