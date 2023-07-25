<?php
include "header.php";
require_once "pdo.php";
require_once "helper.php";

//$csrfToken = genCsrfToken();
?>

    <title>All Products</title>
    </head>
    <body>

<?php
include "navbar.php";

if (checkLogin()) {
    $user = $_SESSION["username"];
    ?>

    <!-- Table for showing all products -->
    <div class="container">
        <h2 class="text-center" style="margin-top: 20px">All Products</h2>
        <?php flash(); ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                        $sql = "select * from sells";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo('<tr><td>');
                            echoTd($row['name']);
                            echoTd($row['price']);
                            echoTd($row['category']);
                            ?>
                            <a href="detail.php?productId=<?= $row['id']; ?>" class="btn btn-outline-success">Details</a>
                            </td>
                            </tr>
                            <?php
                        }
                    } catch (PDOException $e) {
                        error_log($e->getMessage());
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