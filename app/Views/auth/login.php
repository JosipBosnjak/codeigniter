<!-- app/Views/auth/login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (session()->has('error')): ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/auth/processLogin') ?>" method="post">
        <!-- Add form fields for login -->
        <!-- Use form helper functions for better security -->
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="<?= base_url('/auth/register') ?>">Register</a></p>
</body>
</html>
