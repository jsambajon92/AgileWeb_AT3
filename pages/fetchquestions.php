<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../config/config.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, question FROM questions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($questions ? $questions : []);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unexpected error: ' . $e->getMessage()]);
}
