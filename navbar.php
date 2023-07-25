
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav nav-tabs me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Shopping</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="market.php">All Products</a></li>
                        <li><a class="dropdown-item" href="#">Food</a></li>
                        <li><a class="dropdown-item" href="#">Clothes</a></li>
                        <li><a class="dropdown-item" href="#">Groceries</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sells.php">My Sells</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>