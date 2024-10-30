<!-- src/public/views/users/update.php -->
<?php $title = 'Update User'; ?>
<?php ob_start(); ?>

<h1>Update User</h1>
<form action="/users/update?id=<?php echo htmlspecialchars($user['id']); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role">
            <option value="Author" <?php echo ($user['role'] === 'Author') ? 'selected' : ''; ?>>Author</option>
            <option value="Admin" <?php echo ($user['role'] === 'Admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Leave blank to keep current password">
    </div>
    <button type="submit">Update User</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>