<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $pdo = new PDO("mysql:host=$servername;port=8889;dbname=userDb", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected DB successfully";
} catch(PDOException $e) {
    echo "Failed to connect DB: " . $e->getMessage();
}
?>