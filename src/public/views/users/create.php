<!-- src/public/views/users/create.php -->
<?php $title = 'Create User'; ?>

<?php ob_start(); ?>
<h1>Create User</h1>
<form action="/users/create" method="POST">
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role">
            <option value="Author">Author</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Create User</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>