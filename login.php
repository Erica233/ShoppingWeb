<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])){
    unset($_SESSION["username"]);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Please login</h1>
<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" value="" id="username">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" value="" id="password">
    </div>
    <input type="submit" value="Sign In">
</form>
<footer>Do not have an account? <a href="register.php">Register here</a></footer>
</body>
</html>