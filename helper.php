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
?>