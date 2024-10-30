<?php $title = 'Update Post' ?>

<?php ob_start() ?>

<h1>Update Post</h1>

<?php if (isset($post)) : ?>
<form method="POST" action="/index.php/update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($post['id'] ?? '') ?>"> <!-- Updated -->

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title'] ?? '') ?>"> <!-- Updated -->

    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?= htmlspecialchars($post['slug'] ?? '') ?>"> <!-- Updated -->

    <label for="image">Image URL</label>
    <input type="text" id="image" name="image" value="<?= htmlspecialchars($post['image'] ?? '') ?>"> <!-- Updated -->

    <label for="body">Body</label>
    <textarea id="body" name="body"><?= htmlspecialchars($post['body'] ?? '') ?></textarea> <!-- Updated -->

    <label for="published">Published</label>
    <input type="checkbox" id="published" name="published"
        <?= isset($post['published']) && $post['published'] ? 'checked' : '' ?>>

    <button type="submit">Update Post</button>
</form>
<?php else : ?>
<p>Post not found.</p>
<?php endif ?>

<a href="/index.php">Back to List</a>

<?php $content = ob_get_clean() ?>

<?php include __DIR__ . '/../layout.php' ?>