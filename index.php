<?php
include "header.php";
include "navbar.php";
?>

    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php
    if (isset($_SESSION["success"])) {
        echo("<p style='color: limegreen'>".$_SESSION["success"]."</p>");
        unset($_SESSION["success"]);
    }
    //check if logged in
    if (!isset($_SESSION["username"])) { ?>
        <a href="register.php">Register</a><br>
        <a href="login.php">Login</a>
    <?php } else { ?>
        <a href="products.php">Start Shopping</a><br>
        <a href="login.php">Logout</a>
    <?php } ?>
</body>
</html>