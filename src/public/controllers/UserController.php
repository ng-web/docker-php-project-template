<?php
require_once __DIR__ . '/../models/User.php';

function list_users_action() {
    $users = get_all_users();
    require __DIR__ . '/../views/users/users.php';
}

function show_user_action($id) {
    $user = get_user_by_id($id);
    require __DIR__ . '/../views/users/show.php';
}

function create_user_action() { 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];

        $result = create_user($username, $email, $role, $password);

        if ($result) {
            header('Location: /users');
            exit;
        } else {
            echo 'Error creating user.';
        }
    }

    require __DIR__ . '/../views/users/create.php';
}

function update_user_action() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = !empty($_POST['password']) ? $_POST['password'] : null;

        // Call update_user with the password only if provided
        $result = update_user($id, $username, $email, $role, $password);

        if ($result) {
            header('Location: /users');
            exit;
        } else {
            echo 'Error updating user.';
        }
    } else {
        if (isset($_GET['id'])) {
            $user = get_user_by_id($_GET['id']);
            require __DIR__ . '/../views/users/update.php';
        } else {
            header('HTTP/1.1 404 Not Found');
            echo '<html><body><h1>User ID Not Provided</h1></body></html>';
        }
    }
}

function delete_user_action($id) {
    $result = delete_user($id);
    if ($result) {
        header('Location: /users');
        exit;
    } else {
        echo 'Error deleting user.';
    }
}