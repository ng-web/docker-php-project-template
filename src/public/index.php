<?php
// Load and initialize any global libraries
require_once __DIR__ . '/controllers/PostController.php';
require_once __DIR__ . '/controllers/UserController.php';

// Route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Homepage Route
if ($uri === '/index.php' || $uri === '/') {
    require __DIR__ . '/views/home.php';
}

// Routing posts
elseif ($uri === '/posts') {
    list_action();
} elseif ($uri === '/posts/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} elseif ($uri === '/posts/create') {
    create_action();
} elseif ($uri === '/posts/update' && isset($_GET['id'])) {
    update_action();
} elseif ($uri === '/posts/delete' && isset($_GET['id'])) {
    //delete_post_action($_GET['id']);

// Routing users
} elseif ($uri === '/users') {
    list_users_action();
} elseif ($uri === '/users/show' && isset($_GET['id'])) {
    show_user_action($_GET['id']);
} elseif ($uri === '/users/create') {
    create_user_action();
} elseif ($uri === '/users/update' && isset($_GET['id'])) {
    update_user_action();
} elseif ($uri === '/users/delete' && isset($_GET['id'])) {
    delete_user_action($_GET['id']);

// Fallback for 404
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}