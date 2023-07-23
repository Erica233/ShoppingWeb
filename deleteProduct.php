<?php
session_start();
include_once 'pdo.php';
require_once 'helper.php';

flash();
//$csrfToken = genCsrfToken();

if (checkLogin()) {
    $user = $_SESSION["username"];
}
if (isset($_POST['deleteProduct'])) {
    if (!empty($_POST['csrfToken'])) {
        if (hash_equals($_SESSION['csrfToken'], $_POST['csrfToken'])) {
            try{
                $sql = "delete from sells where username=:username and id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':id' => $_POST['id'],
                    ':username' => $user));
                $_SESSION['success'] = 'Delete product successfully!';
//                error_log("edit: " . $_SESSION['csrfToken']);
            }
            catch(PDOException $e){
                $_SESSION['error'] = 'Failed to delete your product!';
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



