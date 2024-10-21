<?php
session_start(); // Khởi động session để lưu giỏ hàng

header('Content-Type: application/json');

// Kiểm tra nếu có yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Lấy thông tin sản phẩm
    $productId = $data['product_id'];
    $color = $data['color'];

    // Kiểm tra nếu giỏ hàng chưa tồn tại trong session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Thêm sản phẩm vào giỏ hàng
    $_SESSION['cart'][] = [
        'product_id' => $productId,
        'color' => $color
    ];

    // Trả về phản hồi
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
