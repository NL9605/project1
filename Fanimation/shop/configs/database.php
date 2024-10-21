<?php
// Kết nối cơ sở dữ liệu
function database()
{
    $host = "mysql:host=127.0.0.1;dbname=Fan"; // Cập nhật tên cơ sở dữ liệu
    $username = "root";
    $password = "HTTN9605dtl";

    try {
        $conn = new PDO($host, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $ex) {
        echo json_encode(["error" => "Connection failed: " . $ex->getMessage()]);
        exit;
    }
}

// Lấy sản phẩm
function getProducts()
{
    $conn = database();
    $sql = "SELECT product_id, product_name, price, image FROM products";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } catch (PDOException $ex) {
        echo json_encode(["error" => "Query failed: " . $ex->getMessage()]);
        exit;
    }
}

// Thiết lập header để trả về định dạng JSON
header('Content-Type: application/json');

// Lấy danh sách sản phẩm và trả về
$products = getProducts();
echo json_encode($products);
?>
