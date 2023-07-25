<?php
include "header.php";
require_once "pdo.php";
require_once "helper.php";
include "navbar.php";

flash();
if (checkLogin()) {
    $user = $_SESSION["username"];

    if (isset($_GET['productId']) ) {
        try {
            $sql = "select * from sells where id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':id' => $_GET['productId']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $_SESSION['error'] = 'Product does not exist!';
                header('Location: market.php');
                return;
            }
?>

    <title>Details - <?= htmlentities($row['name']); ?></title>
    </head>
    <body>
<h2 class="text-center mt-5">Product details - <?= htmlentities($row['name']); ?></h2>

<?php
flash();
?>

<!-- View Product Details -->
<div class="container mt-3">
    <div class="mb-3">
        <label for="name">Name: </label> <?= htmlentities($row['name']); ?>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Sale Price</label> <?= htmlentities($row['price']); ?>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity: </label> <?= htmlentities($row['quantity']); ?>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category: </label> <?= htmlentities($row['category']); ?>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description: </label> <?= htmlentities($row['description']); ?>
    </div>

    <a type="button" class="btn btn-outline-secondary" href="market.php">Back</a>
    <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
    <button type="submit" class="btn btn-outline-success" name="buy" value="Buy Now">Buy Now</button>
    <button type="submit" class="btn btn-outline-primary" name="addCart" value="Add to Cart">Add to Cart</button>
</div>
<?php
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Failed to add your product!';
        }
    }
} ?>
<?php
include "footer.php";
?>