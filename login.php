<?php
require_once "pdo.php";
require_once "helper.php";
include "header.php";
include "navbar.php";

//checks if login info is correct, if correct, do login
if (isset($_POST['login']) && isset($_POST["username"]) && isset($_POST["password"])) {
    unset($_SESSION["username"]); //logout current user
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        //find user info from database
        $sql = "select * from users where username=:username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':username' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if username and password match
        if (!$row || !password_verify($password, $row['password'])) {
            $_SESSION['error'] = 'Incorrect username or password!';
            header("Location: login.php");
            return;
        } else {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["success"] = "Logged In Successfully!";
            header("Location: index.php");
            return;
        }
    }
    catch (PDOException $e) {
        error_log($e->getMessage());
    }
}
?>

    <title>Login Page</title>
    </head>
<body>
<h1 class="text-center mt-5">Please login</h1>

<?php
flash();
?>

<!-- login form -->
<div class="container mt-3">
    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            Do not have an account? <a href="register.php">Register here</a>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Sign In</button>
    </form>
</div>

<?php
include "footer.php";
?>