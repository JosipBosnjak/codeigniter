<!-- app/Views/auth/register.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if (session()->has('success')): ?>
        <p style="color: green;"><?= session('success') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/auth/processRegistration') ?>" method="post">
        <!-- Add form fields for registration -->
        <!-- Use form helper functions for better security -->
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <br>

        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required>

        <br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required>

        <br>

        <label for="picture">Picture:</label>
        <input type="text" name="picture">

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <br>

        <label for="web">Web Address:</label>
        <input type="text" name="web">

        <br>

        <label for="isadmin">Is Admin:</label>
        <input type="checkbox" name="isadmin">

        <br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="<?= base_url('/auth/login') ?>">Login</a></p>
</body>
</html>
