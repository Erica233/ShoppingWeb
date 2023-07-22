<?php
include "header.php";
include "navbar.php";
require_once "helper.php";
?>

<title>Welcome</title>
</head>
<body>
<h1>Welcome</h1>

<?php
flash();
if (checkLogin()) { ?>
    <a href="market.php">Start Shopping</a><br>
    <a href="logout.php">Logout</a>
<?php } ?>

<?php
include "footer.php";
?>