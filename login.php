<?php
require_once "pdo.php";
include "header.php";
//TODO: login sys
if (isset($_POST["username"]) && isset($_POST["password"])) {
    unset($_SESSION["username"]); //logout current user
    if ($_POST["password"] == "123") {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["success"] = "Logged In Successfully!";
        header("Location: index.php");
        return;
    } else {
        $_SESSION["error"] = "Incorrect password!";
        header("Location: login.php");
        return;
    }
}
?>

    <title>Login Page</title>
    </head>
<body>
<div><?php include "navbar.php" ?></div>
<h1 class="text-center mt-5">Please login</h1>
<?php
include "helper.php";
flash();
?>
<div class="container mt-3">
    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            Do not have an account? <a href="register.php">Register here</a>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>
<?php
include "footer.php";
?>