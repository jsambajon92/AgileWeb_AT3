<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "leadership_db";

// Create PDO connection
try {
    // PDO connection string (using UTF-8 for character encoding)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
