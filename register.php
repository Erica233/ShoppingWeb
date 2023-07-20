<?php
include "header.php";
//TODO: register sys
?>

    <title>Registration Page</title>
    </head>
<body>
<div><?php include "navbar.php" ?></div>
<h1 class="text-center mt-5">Register here!</h1>
<?php
include "helper.php";
flash();
?>
<div class="container mt-3">
    <form method="post" action="register.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Re-enter Password: </label>
            <input type="password" name="password2" class="form-control" id="password2">
        </div>
        <div class="mb-3">
            Already have an account? <a href="login.php">Login here</a>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
<?php
include "footer.php";
?>