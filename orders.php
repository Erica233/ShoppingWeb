<?php
include "header.php";
require_once "pdo.php";
require_once "helper.php";

//$csrfToken = genCsrfToken();
?>

    <title>All Orders</title>
    </head>
    <body>

<?php
include "navbar.php";

if (checkLogin()) {
    $user = $_SESSION["username"];
    ?>

    <!-- Table for showing all orders -->
    <div class="container">
        <h2 class="text-center" style="margin-top: 20px">Orders</h2>
        <?php flash(); ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                        $sql = "select orders.id as order_id, sells.name as product_name, orders.quantity as quantity, 
                                        orders.total_price as total_price
                                from orders join sells 
                                on sells.id=orders.product_id 
                                where buyer_name=:buyer_name";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(array(':buyer_name' => $user));
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo('<tr><td>');
                            echoTd($row['order_id']);
                            echoTd($row['product_name']);
                            echoTd($row['quantity']);
                            echo(htmlentities($row['total_price']));
                            ?>
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