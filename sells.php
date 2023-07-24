<?php
require_once "pdo.php";
require_once "helper.php";
include "header.php";
include "navbar.php";

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

    <!-- Table for showing my selling products -->
    <div class="container">
        <h2 class="text-center" style="margin-top: 20px">Manage My Products</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add a new
            product
        </button>
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
                    $sql = "select * from sells where username=:username";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(':username' => $user));
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo('<tr><td>');
                        echoTd($row['id']);
                        echoTd($row['name']);
                        echoTd($row['price']);
                        echoTd($row['quantity']);
                        echoTd($row['category']);
                        ?>
                        <?php include 'crudModal.php'; ?>
                        <a href="#edit_<?= $row['id']; ?>" class="btn btn-outline-success" data-bs-toggle="modal">Edit</a>
                        <a href="#delete_<?= $row['id']; ?>" class="btn btn-outline-danger" data-bs-toggle="modal">Delete</a>
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