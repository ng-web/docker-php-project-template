<?php
require_once __DIR__ . '/../models/Post.php';

function list_action()
{
    $posts = get_all_posts();
    require __DIR__ . '/../views/posts/posts.php';
}

function show_action($id)
{
    $post = get_post_by_id($id);
    require __DIR__ . '/../views/posts/show.php';
}

function create_action()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form values
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $image = $_POST['image'];
        $body = $_POST['body'];
        $published = isset($_POST['published']) ? 1 : 0;

        // Call function to insert post
        $result = create_post($title, $slug, $image, $body, $published);

        if ($result) {
            // Redirect to post list or show success message
            header('Location: /index.php');
            exit;
        } else {
            echo 'Error adding post.';
        }
    }

    require __DIR__ . '/../views/posts/create.php';
}
 
function update_action()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the post ID from the form
        $id = $_POST['id'];
        
        // Get updated form values
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $image = $_POST['image'];
        $body = $_POST['body'];
        $published = isset($_POST['published']) ? 1 : 0;

        // Call function to update the post
        $result = update_post($id, $title, $slug, $image, $body, $published);

        if ($result) {
            // Redirect to post list or show success message
            header('Location: /index.php');
            exit;
        } else {
            echo 'Error updating post.';
        }
    } else {
        // Fetch post by ID to show in form for editing
        $post = get_post_by_id($_GET['id']);
        require __DIR__ . '/../views/posts/update.php';
    }
} 