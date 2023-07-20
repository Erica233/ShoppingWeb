<?php
include "header.php";
include "navbar.php";
?>

    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php
    include "helper.php";
    flash();
    //check if logged in
    if (!isset($_SESSION["username"])) { ?>
        <a href="register.php">Register</a><br>
        <a href="login.php">Login</a>
    <?php } else { ?>
        <a href="market.php">Start Shopping</a><br>
        <a href="logout.php">Logout</a>
    <?php } ?>
</body>
</html>