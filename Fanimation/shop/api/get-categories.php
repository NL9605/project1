<?php
include '../configs/database.php'; // Kết nối đến cơ sở dữ liệu

// Xóa bảng products
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_products'])) {
    $query = "DROP TABLE IF EXISTS products"; // Câu lệnh xóa bảng

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo json_encode(['message' => "Bảng 'products' đã được xóa thành công."]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Xóa bảng thất bại: ' . $e->getMessage()]);
    }
}

// Câu lệnh để lấy danh sách danh mục và số lượng sản phẩm
$query = "
    SELECT c.category_id, c.category_name, COUNT(p.product_id) as product_count
    FROM categories c
    LEFT JOIN products p ON c.category_id = p.category_id
    GROUP BY c.category_id
";

// Chuẩn bị và thực hiện câu lệnh
try {
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Lấy kết quả dưới dạng mảng kết hợp
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($categories);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}
?>
