<?php
session_start();
ob_start();
include "./configs/database.php";
include_once './models/ProductModel.php';
include_once './models/CategoryModel.php';
include_once './models/SizeModel.php';
include_once './models/DiscountModel.php';

$conn = database();

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'product':
            $productModel = new ProductModel($conn);
            $products = $productModel->getAllProducts();
            include "views/product/product.php";
            break;

        case 'createproduct':
            $productModel = new ProductModel($conn);
            $categoryModel = new CategoryModel($conn);
            $sizeModel = new SizeModel($conn);
            $discountModel = new DiscountModel($conn);
            $categories = $categoryModel->getAllCategories();
            $sizes = $sizeModel->getAllSizes();
            $discounts = $discountModel->getAllDiscounts();

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
                $product_name = $_POST['product_name'];
                $product_description = $_POST['description'];
                $product_price = $_POST['price'];
                $category_id = $_POST['category_id'];
                $size_id = $_POST['size_id'];
                $discount_id = isset($_POST['discount_id']) && $_POST['discount_id'] !== '' ? (int)$_POST['discount_id'] : null;

                // Xử lý upload ảnh
                $image = ''; // Khởi tạo danh sách ảnh rỗng
                if (isset($_FILES['image_files']) && is_array($_FILES['image_files']['name'])) {
                    $uploaded_images = [];
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    $max_file_size = 2 * 1024 * 1024; // 2MB
                    $target_dir = __DIR__ . '/uploads/'; // Thư mục tải lên

                    if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0755, true);
                    }

                    foreach ($_FILES['image_files']['name'] as $key => $filename) {
                        if ($_FILES['image_files']['error'][$key] !== UPLOAD_ERR_OK) {
                            continue; // Bỏ qua nếu có lỗi
                        }

                        $file_type = mime_content_type($_FILES['image_files']['tmp_name'][$key]);
                        if (!in_array($file_type, $allowed_types) || $_FILES['image_files']['size'][$key] > $max_file_size) {
                            continue; // Bỏ qua nếu loại tệp không hợp lệ hoặc quá lớn
                        }

                        $unique_name = uniqid() . '_' . basename($filename);
                        $target_file = $target_dir . $unique_name;

                        if (move_uploaded_file($_FILES['image_files']['tmp_name'][$key], $target_file)) {
                            $uploaded_images[] = 'uploads/' . $unique_name; // Lưu đường dẫn tương đối
                        }
                    }

                    if (!empty($uploaded_images)) {
                        $image = implode(',', $uploaded_images); // Kết hợp các ảnh đã tải lên
                    }
                }

                // Tạo sản phẩm mới
                $productModel->createProduct($product_name, $product_description, $product_price, $category_id, $size_id, $discount_id, $image);
                header("Location: index.php?act=product");
                exit;
            }

            include 'views/product/create_product.php';
            break;

        case 'editproduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $productModel = new ProductModel($conn);
                $product = $productModel->getProductById($id);

                if (!$product) {
                    echo "<p>Product not found with ID: " . htmlspecialchars($id) . "</p>";
                    break; // Nếu không tìm thấy sản phẩm
                }

                $categoryModel = new CategoryModel($conn);
                $sizeModel = new SizeModel($conn);
                $discountModel = new DiscountModel($conn);
                $categories = $categoryModel->getAllCategories();
                $sizes = $sizeModel->getAllSizes();
                $discounts = $discountModel->getAllDiscounts();

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
                    $product_name = $_POST['product_name'];
                    $product_description = $_POST['description'];
                    $product_price = $_POST['price'];
                    $category_id = $_POST['category_id'];
                    $size_id = $_POST['size_id'];
                    $discount_id = isset($_POST['discount_id']) && $_POST['discount_id'] !== '' ? (int)$_POST['discount_id'] : null;

                    // Xử lý upload ảnh
                    $image = $product['image']; // Giữ nguyên ảnh cũ nếu không tải ảnh mới lên
                    if (isset($_FILES['image_files']) && is_array($_FILES['image_files']['name'])) {
                        $uploaded_images = [];
                        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                        $max_file_size = 2 * 1024 * 1024; // 2MB
                        $target_dir = __DIR__ . '/uploads/';

                        if (!is_dir($target_dir)) {
                            mkdir($target_dir, 0755, true);
                        }

                        foreach ($_FILES['image_files']['name'] as $key => $filename) {
                            if ($_FILES['image_files']['error'][$key] !== UPLOAD_ERR_OK) {
                                continue;
                            }

                            $file_type = mime_content_type($_FILES['image_files']['tmp_name'][$key]);
                            if (!in_array($file_type, $allowed_types) || $_FILES['image_files']['size'][$key] > $max_file_size) {
                                continue;
                            }

                            $unique_name = uniqid() . '_' . basename($filename);
                            $target_file = $target_dir . $unique_name;

                            if (move_uploaded_file($_FILES['image_files']['tmp_name'][$key], $target_file)) {
                                $uploaded_images[] = 'uploads/' . $unique_name;
                            }
                        }

                        if (!empty($uploaded_images)) {
                            $image = $product['image'] ? $product['image'] . ',' . implode(',', $uploaded_images) : implode(',', $uploaded_images); // Kết hợp với ảnh cũ
                        }
                    }

                    // Cập nhật sản phẩm
                    $productModel->editProduct($id, $product_name, $product_description, $product_price, $category_id, $size_id, $discount_id, $image);
                    header("Location: index.php?act=product");
                    exit;
                }

                include 'views/product/editproduct.php';
            }
            break;

        case 'deleteproduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $productModel = new ProductModel($conn);
                $productModel->deleteProduct($id);
                header("Location: index.php?act=product");
                exit;
            }
            break;

        default:
            break;
    }
}
?>
