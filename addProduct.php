<?php
session_start();
include_once 'pdo.php';
require_once 'helper.php';

flash();
if (checkLogin()) {
    $user = $_SESSION["username"];
}
if (isset($_POST['addProduct'])) {
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
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
} else {
    error_log('enter else');
    $_SESSION['error'] = 'Failed to add your product!';
    $_SESSION['message'] = 'Fill up add form first';
}
header('Location: sells.php');
?>



