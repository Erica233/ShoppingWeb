<?php
require_once "pdo.php";
include "header.php";
include "navbar.php";
?>

<title>Manage My Products</title>
</head>
<body>
<h1>Manage My Products</h1>
<?php
include "helper.php";
flash();

//check if logged in
if (!isset($_SESSION["username"])) { ?>
    <a href="register.php">Register</a><br>
    <a href="login.php">Login</a>
<?php } else { ?>



<?php } ?>
</body>
</html>