<?php
require_once "pdo.php";
include "header.php";
include "navbar.php";
include "helper.php";
flash();
$csrfToken = genCsrfToken();
?>

    <title>Manage My Products</title>
    </head>

    <body>
<?php
flash();
if (checkLogin()) {
    $user = $_SESSION["username"];
    ?>

    <div class="container mx-auto">
        <h2 class="text-center" style="margin-top: 20px">Manage My Products</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add a new
            product
        </button>
    </div>

    <!-- AddProduct details in Modal -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a new product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="addProduct.php">
                    <div class="modal-body">
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
                                <textarea class="form-control" aria-label="With textarea" name="description"
                                          required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
                        <button type="submit" class="btn btn-primary" name="addProduct" value="Add Product">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table for showing my selling products -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = $pdo->query('select * from sells where username=' . $user);
                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        echo('<tr><td>');
                        echoTd($row['id']);
                        echoTd($row['name']);
                        echoTd($row['price']);
                        echoTd($row['quantity']);
                        echoTd($row['category']);
                        ?>
                        <?php include 'crudModal.php'; ?>
                        <a href="#edit_<?= $row['id']; ?>" class="btn btn-outline-success" data-bs-toggle="modal">Edit</a>
                        <a href="" class="btn btn-outline-danger">Delete</a>
                        </td>

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php } ?>
<?php
include "footer.php";
?>