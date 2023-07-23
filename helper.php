<?php
function flash() {
    if (isset($_SESSION["error"])) {
        echo("<p style='color: red'>".$_SESSION["error"]."</p>");
        unset($_SESSION["error"]); //flash
    }
    if (isset($_SESSION["success"])) {
        echo("<p style='color: limegreen'>".$_SESSION["success"]."</p>");
        unset($_SESSION["success"]);
    }
}
//funcName();

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
?>