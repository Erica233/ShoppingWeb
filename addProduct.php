<?php
require_once "pdo.php";
require_once "helper.php";
include "header.php";
include "navbar.php";

flash();
if (checkLogin()) {
    $user = $_SESSION["username"];
}

// Add product operations:
if (isset($_POST['addProduct'])) {
    if (!empty($_POST['csrfToken']) && hash_equals($_SESSION['csrfToken'], $_POST['csrfToken'])) {
        try {
            $sql = "insert into sells (name, username, price, quantity, category, description) 
                            values (:name, :username, :price, :quantity, :category, :description)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':username' => $user,
                ':price' => $_POST['price'],
                ':quantity' => $_POST['quantity'],
                ':category' => $_POST['category'],
                ':description' => $_POST['description']));
            $_SESSION['success'] = 'Product added successfully!';
//          error_log("add: " . $_SESSION['csrfToken']);
            header('Location: sells.php');
            return;
        }
        catch (PDOException $e) {
            $_SESSION['error'] = 'Failed to add your product!';
        }
    } else {
        error_log("mismatch CSRF token!");
    }
}
?>

    <title>Add A New Product</title>
    </head>
    <body>
<h2 class="text-center mt-5">Enter new product details</h2>

<?php
flash();
?>

<!-- addProduct form -->
<div class="container mt-3">
    <form method="post" action="addProduct.php">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Sale Price</label>
            <input type="number" class="form-control" id="price" min="0.01" step=".01" name="price"
                   required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="quantity" min="1" max="10000" name="quantity"
                   required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Product Category</label>
            <select class="form-select" id="category" aria-label="Default select example"
                    name="category" required>
                <option value="" disabled selected>Select Product Category</option>
                <option value="Food">Food</option>
                <option value="Clothes">Clothes</option>
                <option value="Groceries">Groceries</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <div class="input-group" id="description">
                <textarea class="form-control" aria-label="With textarea" name="description" required></textarea>
            </div>
        </div>
        <a class="btn btn-secondary" href="sells.php">Back</a>
        <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrfToken'] ?>">
        <button type="submit" class="btn btn-primary" name="addProduct" value="Add Product">Add Product</button>
    </form>
</div>

<?php
include "footer.php";
?>