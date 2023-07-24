<?php
/* Shows flash messages */
function flash() {
//    $_SESSION["error"] = 'lalala';
    if (isset($_SESSION["error"])) {
        echo("<p style='color: red'>".$_SESSION["error"]."</p>");
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) {
        echo("<p style='color: limegreen'>".$_SESSION["success"]."</p>");
        unset($_SESSION["success"]);
    }
}

/* Checks if the user is logged in */
function checkLogin() {
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

function echoTd($colName) {
    echo(htmlentities($colName));
    echo('</td><td>');
}

/* Generates a CSRF token to protect from attacks */
function genCsrfToken() {
    $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
    return $_SESSION['csrfToken'];
}
?>