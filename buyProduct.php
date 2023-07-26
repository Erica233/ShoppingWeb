<?php
session_start();
require_once 'pdo.php';
require_once 'helper.php';

flash();
if (checkLogin()) {
    $user = $_SESSION["username"];
}

// Buy product operations:
if (isset($_POST['buyProduct'])) {
    if (!empty($_POST['csrfToken']) && hash_equals($_SESSION['csrfToken'], $_POST['csrfToken'])) {
        try {
            //update stock quantity in sells db
            $sql = "update sells set quantity=:quantity where id=:id";
            $stmt = $pdo->prepare($sql);
            $leftStock = $_POST['quantity'] - $_POST['totalQuantity'];
            $stmt->execute(array(
                ':id' => $_POST['id'],
                ':quantity' => $leftStock));

            //create order entry
            $sql = "insert into orders (buyer_name, product_id, quantity) 
                    values (:buyer_name, :product_id, :quantity)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':buyer_name' => $user,
                ':product_id' => $_POST['id'],
                ':quantity' => $_POST['totalQuantity']));
            $_SESSION['success'] = 'Bought Product successfully!';
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Failed to buy product!';
            error_log($e->getMessage());
        }
    } else {
        error_log("mismatch CSRF token!");
    }
}
header('Location: market.php');
?>



