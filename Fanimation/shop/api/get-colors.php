<?php

$host = '127.0.0.1';
$dbname = 'Fan';
$username = 'root';
$password = 'HTTN9605dtl';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn để lấy danh sách màu sắc
    $stmt = $pdo->prepare("SELECT DISTINCT name FROM colors");
    $stmt->execute();

    // Lấy kết quả
    $colors = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($colors);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
