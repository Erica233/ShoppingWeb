<?php
include "header.php";
require_once "helper.php";
?>

    <title>Welcome</title>
    </head>
    <body>

<?php
include "navbar.php";

if (checkLogin()) { ?>
    <h2>Welcome, <?= $_SESSION['username']; ?>!</h2>
    <?php flash(); ?>
    <a href="market.php">Start Shopping</a><br>
    <a href="logout.php">Logout</a>
<?php } ?>

<?php
include "footer.php";
?>