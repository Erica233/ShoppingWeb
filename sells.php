<?php
require_once "pdo.php";
include "header.php";
include "navbar.php";
include "helper.php";
flash();
?>

<title>Manage My Products</title>
</head>

<body>
<?php
flash();
if (checkLogin()) { ?>

<div class="container mx-auto">
    <h1 class="text-center" style="margin-top: 20px">Manage My Products</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add a new product
    </button>
</div>

<!-- Modal for adding product details -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a new product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Sale Price</label>
                    <input type="number" class="form-control" id="price" min="0.01" step=".01">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control" id="quantity" min="1" max="10000">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Product Category</label>
                    <select class="form-select" id="category" aria-label="Default select example">
                        <option selected>Select Product Category</option>
                        <option value="Food">Food</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Groceries">Groceries</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Product Description</label>
                    <div class="input-group" id="description">
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addProductToSell() {
        var name = $("#name").val();
        var price = $("#price").val();
        var quantity = $("#quantity").val();
        var category = $("#category").val();
        var description = $("#description").val();


    }
</script>

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


                $sql = $pdo->query('select * from sells');
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo('<tr><td>');
                    echoTd($row['id']);
                    echoTd($row['name']);
                    echoTd($row['price']);
                    echoTd($row['quantity']);
                    echoTd($row['category']);
                    //echo('')

                }

                ?>
                <tr>


                </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>



<?php } ?>
<?php
include "footer.php";
?>