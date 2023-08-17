<?php
/* Shows flash messages */
function flash()
{
    if (isset($_SESSION["error"])) {
        echo('<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>');
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) {
        echo('<div class="alert alert-success" role="alert">' . $_SESSION["success"] . '</div>');
        unset($_SESSION["success"]);
    }
}

/* Checks if the user is logged in */
function checkLogin()
{
    if (!isset($_SESSION["username"])) {
        echo("<p>Please login first!</p>");
        echo('<a href="register.php">Register</a><br>');
        echo('<a href="login.php">Login</a>');
        return false;
    } else {
        //echo($_SESSION["username"]);
        return true;
    }
}

function echoTd($colName)
{
    echo(htmlentities($colName));
    echo('</td><td>');
}

/* Generates a CSRF token to protect from attacks */
function genCsrfToken()
{
    if (!isset($_SESSION['csrfToken'])) {
        $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
//      error_log('gen csrf: ' . $_SESSION['csrfToken']);
        return $_SESSION['csrfToken'];
    }
}
$csrfToken = genCsrfToken();
?>