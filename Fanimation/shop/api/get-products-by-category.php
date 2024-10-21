<?php

function database() {
    $host = '127.0.0.1';
    $dbname = 'Fan';
    $username = 'root';
    $password = 'HTTN9605dtl';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}

$conn = database();

// Lấy danh sách các danh mục sản phẩm
$query = "SELECT * FROM Categories"; // Thay 'Categories' bằng tên bảng danh mục của bạn
$stmt = $conn->prepare($query);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Trả về danh sách dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($categories);
?>
