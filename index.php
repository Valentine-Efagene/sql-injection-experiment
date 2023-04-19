<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/views/index.php';
        break;

    case '/nedu':
    case '/nedu/':
    case '/nedu/home':
        require __DIR__ . '/views/dashboard.php';
        break;

    case '/nedu/store-user':
        require __DIR__ . '/store-user.php';
        break;

    case '/nedu/sign-in':
        require __DIR__ . '/views/sign-in.php';
        break;

        // Pages

    case '/nedu/create-user':
        require __DIR__ . '/views/create-user.php';
        break;

    case '/nedu/dashboard':
        require __DIR__ . '/views/dashboard.php';
        break;

    case '/nedu/admin-dashboard':
        require __DIR__ . '/views/admin-dashboard.php';
        break;

    case '/nedu/auth':
        require __DIR__ . '/auth.php';
        break;

    case '/nedu/session-destroy':
    case '/nedu/session-destroy?':
        require __DIR__ . '/session-destroy.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
