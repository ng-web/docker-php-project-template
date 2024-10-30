<?php $title = 'Create New Post' ?>

<?php ob_start() ?>

<h1>Create New Post</h1>

<form action="/index.php/create" method="POST">
    <p><label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </p>
    <p><label for="slug">Slug:</label>
        <input type="text" id="slug" name="slug" required>
    </p>

    <p><label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required>
    </p>

    <p><label for="body">Body:</label>
        <textarea id="body" name="body" rows="4" cols="50" required></textarea>
    </p>

    <p><label for="published">Published:</label>
        <input type="checkbox" id="published" name="published">
    </p>

    <p><button type="submit">Create Post</button>
</form>

<?php $content = ob_get_clean() ?>

<?php include __DIR__ . '/../layout.php' ?>