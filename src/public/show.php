<?php
// Connect to the database
$connection = new PDO("mysql:host=mariadb;dbname=applicationdb", 'root', 'root');

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the query to get the post by ID
    $statement = $connection->prepare('SELECT title, body, created_at FROM posts WHERE id = :id'); // Corrected the query by adding the columns
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    // Fetch the post
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    // If the post is found, display it
    if ($post) {
        $title = $post['title'];
        $body = $post['body'];
        $created_at = $post['created_at'];
    } else {
        // If no post is found, show a 404 message
        header('HTTP/1.1 404 Not Found');
        echo '<h1>Post Not Found</h1>';
        exit();
    }
} else {
    // If no ID is provided, redirect to the main page or show an error
    header('Location: /index.php');
    exit();
}

// Close the database connection
$connection = null;
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($title) ?></title>
</head>

<body>
    <h1><?= htmlspecialchars($title) ?></h1>
    <p><small>Published on: <?= htmlspecialchars($created_at) ?></small></p>
    <div>
        <?= nl2br(htmlspecialchars($body)) ?>
    </div>
    <a href="/index.php">Back to list</a>
</body>

</html>