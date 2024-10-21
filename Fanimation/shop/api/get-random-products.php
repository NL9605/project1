<?php

$host = '127.0.0.1';
$dbname = 'Fan';
$username = 'root';
$password = 'HTTN9605dtl';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn để lấy 5 sản phẩm ngẫu nhiên
    $query = "SELECT * FROM products ORDER BY RAND() LIMIT 5";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Lấy kết quả
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($products);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
