<?php
require_once "pdo.php";
require_once "helper.php";
include "header.php";
include "navbar.php";

//TODO: register sys
//checks if registration info is legit,
//if username is not occupied, store this account info
if (isset($_POST['register']) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    unset($_SESSION["username"]); //logout current user
    if ($_POST["password"] !== $_POST["password2"]) {
        $_SESSION['error'] = 'Your passwords not consistent!';
        header("Location: register.php");
        return;
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    //check if username is occupied or not
    $sql = "select * from users where username=:username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':username' => $username));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['error'] = 'Username is occupied!';
        header("Location: register.php");
        return;
    }

    //store new user's info
    $sql2 = "insert into users (username, password) values (:username, :password)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(array(':username' => $username, ':password' => $hash));

    $_SESSION["success"] = "Register Successfully!";
    header("Location: login.php");
    return;
}
?>

    <title>Registration Page</title>
    </head>
    <body>
<h1 class="text-center mt-5">Register here!</h1>

<?php
flash();
?>

<!-- Registration form -->
<div class="container mt-3">
    <form method="post" action="register.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Re-enter Password: </label>
            <input type="password" name="password2" class="form-control" id="password2" required>
        </div>
        <div class="mb-3">
            Already have an account? <a href="login.php">Login here</a>
        </div>
        <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
    </form>
</div>

<?php
include "footer.php";
?>