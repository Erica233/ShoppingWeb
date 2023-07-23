<?php
session_start();
include_once 'pdo.php';
require_once 'helper.php';

flash();
//$csrfToken = genCsrfToken();

if (checkLogin()) {
    $user = $_SESSION["username"];
}
if (isset($_POST['editProduct'])) {
    if (!empty($_POST['csrfToken'])) {
        if (hash_equals($_SESSION['csrfToken'], $_POST['csrfToken'])) {
            try{
                $sql = "update sells set name=:name, price=:price, quantity=:quantity, 
                        category=:category, description=:description 
                        where username=:username and id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':id' => $_POST['id'],
                    ':name' => $_POST['name'],
                    ':username' => $user,
                    ':price' => $_POST['price'],
                    ':quantity' => $_POST['quantity'],
                    ':category' => $_POST['category'],
                    ':description' => $_POST['description']));
                $_SESSION['success'] = 'Product details were edited successfully!';
//                error_log("edit: " . $_SESSION['csrfToken']);
            }
            catch(PDOException $e){
                $_SESSION['error'] = 'Failed to update your product!';
                error_log($e->getMessage());
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



