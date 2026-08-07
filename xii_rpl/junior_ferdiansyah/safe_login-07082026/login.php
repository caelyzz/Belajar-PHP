<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="process/login.php" method="post">
            <label>Email</label>
            <br>
            <input type="email" name="email" required>
            <br><br>

            <label>Password</label>
            <br>
            <input type="password" name="password" required>
            <br><br>

            <label>
                <input type="checkbox" name="remember">
                Remember me
            </label>
            <br><br>

            <button type="submit">
                Login
            </button>

            <a href="register.php">
                Don't have an account?
            </a>
        </form>
    </body>
</html>