<?php

$host = '127.0.0.1';
$dbname = 'Fan';
$username = 'root';
$password = 'HTTN9605dtl';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn để lấy tất cả kích thước
    $stmt = $pdo->query("SELECT size_name FROM sizes");
    $sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($sizes);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
