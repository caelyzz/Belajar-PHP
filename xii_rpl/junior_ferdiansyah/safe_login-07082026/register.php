<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h2>Register</h2>
        <form action="process/register.php" method="POST">
            <label>Username</label><br>
            <input type="text" name="username" required>
            <br><br>

            <label>Email</label><br>
            <input type="email" name="email" required>
            <br><br>

            <label>Password</label><br>
        <input type="password" name="password" required>
        <br><br>

        <label>Konfirmasi Password</label><br>
        <input type="password" name="confirm_password" required>
        <br><br>

        <button type="submit">Register</button>
        </form>
        <br>

        <a href="login.php">
            Already have account?
        </a>
    </body>
</html>