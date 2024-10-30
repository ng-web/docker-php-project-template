<?php
require_once 'Database.php';

use App\Database;

function get_all_users() { 
    $connection = Database::getInstance();
    
    $result = $connection->query('SELECT id, username, email, role, created_at FROM users');
    $users = []; //users array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $users[] = $row;
    }
    
    return $users;
}

function get_user_by_id($id) {
    $connection = Database::getInstance();
    
    $statement = $connection->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function create_user($username, $email, $role, $password) {
    $connection = Database::getInstance();
    
    $statement = $connection->prepare('INSERT INTO users (username, email, role, password) VALUES (:username, :email, :role, :password)');
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':role', $role);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $result = $statement->execute();

    return $result;
}

function update_user($id, $username, $email, $role, $password = null) {
    $connection = Database::getInstance();

    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = 'UPDATE users SET username = :username, email = :email, role = :role, password = :password WHERE id = :id';
    } else {
        // Only update other fields if no new password is provided
        $query = 'UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id';
    }

    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':role', $role);

    if ($password) {
        $statement->bindValue(':password', $hashedPassword);
    }

    return $statement->execute();
}


function delete_user($id) {
    $connection = Database::getInstance();
    $statement = $connection->prepare('DELETE FROM users WHERE id = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $result = $statement->execute();

    return $result;
}