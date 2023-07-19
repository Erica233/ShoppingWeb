<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "root";
$DB_NAME = "ShoppingWebDB";

try {
    $pdo = new PDO("mysql:host=$DB_HOST;port=8889;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("Connected DB successfully");
} catch(PDOException $e) {
    echo "Failed to connect DB: " . $e->getMessage();
}
?>