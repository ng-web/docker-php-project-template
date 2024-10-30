<?php
require_once 'Database.php';

use App\Database;

function get_all_posts()
{
    $connection = Database::getInstance();
    $result = $connection->query('SELECT id, title FROM posts');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    
    return $posts;
}

function get_post_by_id($id)
{
    $connection = Database::getInstance();
    
    $query = 'SELECT created_at, title, body FROM posts WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function create_post($title, $slug, $image, $body, $published)
{
    $connection = Database::getInstance();
    
    $query = 'INSERT INTO posts (title, slug, image, body, published) VALUES (:title, :slug, :image, :body, :published)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':slug', $slug);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':published', $published, PDO::PARAM_INT);

    $result = $statement->execute();

    return $result;
}

function update_post($id, $title, $slug, $image, $body, $published)
{
    $connection = Database::getInstance();
        
    $query = 'UPDATE posts SET title = :title, slug = :slug, image = :image, body = :body, published = :published WHERE id = :id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':slug', $slug, PDO::PARAM_STR);
    $statement->bindValue(':image', $image, PDO::PARAM_STR);
    $statement->bindValue(':body', $body, PDO::PARAM_STR);
    $statement->bindValue(':published', $published, PDO::PARAM_INT);
    
    $result = $statement->execute();
        
    return $result;
}