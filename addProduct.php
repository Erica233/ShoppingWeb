<?php
session_start();
include_once 'pdo.php';
require_once 'helper.php';

flash();
//$csrfToken = genCsrfToken();
if (checkLogin()) {
    $user = $_SESSION["username"];
}
if (isset($_POST['addProduct'])) {
    if (!empty($_POST['csrfToken'])) {
        if (hash_equals($_SESSION['csrfToken'], $_POST['csrfToken'])) {
            try{
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
//                error_log("add: " . $_SESSION['csrfToken']);
            }
            catch(PDOException $e){
                $_SESSION['error'] = 'Failed to add your product!';
            }
        } else {
            error_log("mismatch CSRF token!");
        }
    }
} else {
    error_log('user try to submit empty form.');
    $_SESSION['error'] = 'Fill up details first!';
}
header('Location: sells.php');
?>



