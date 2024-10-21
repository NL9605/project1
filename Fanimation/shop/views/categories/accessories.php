<?php
// accessories.php
include '../../views/layout/header.php';
$api_url = 'http://localhost/Fanimation/shop/api/get-products-by-category.php';
$categories = json_decode(file_get_contents($api_url), true);

function database() {
    $host = "mysql:host=localhost:3306;dbname=Fan";
    $username = "root";
    $password = "HTTN9605dtl";

    try {
        $conn = new PDO($host, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
        exit;
    }
}

function getProductsByCategory($category_id, $offset, $limit) {
    $conn = database();
    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :category_id LIMIT :offset, :limit");
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
        return [];
    }
}

function getTotalProducts($category_id) {
    $conn = database();
    try {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM products WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
        return 0;
    }
}

$base_url = 'http://localhost/Fanimation/app/';
$limit = 5; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $limit; // Calculate the offset

if (!empty($categories)) {
    $accessories = array_filter($categories, function($category) {
        return $category['category_id'] == 5; // Accessories category ID
    });

    if (!empty($accessories)) {
        echo '<h1 class="accessories-title">Accessories</h1>';
        echo '<div class="product-container">';

        $products = getProductsByCategory(5, $offset, $limit); // Adjust category ID for accessories
        $totalProducts = getTotalProducts(5); // Total products for accessories

        foreach ($products as $product) {
            echo '<div class="product-card">';

            $productId = htmlspecialchars($product['product_id']);
            $productName = htmlspecialchars($product['product_name']);
            $productDescription = htmlspecialchars($product['description']);
            $productColor = htmlspecialchars($product['color']);
            $imageUrls = !empty($product['image']) ? explode(',', htmlspecialchars($product['image'])) : [];
            $defaultImage = 'http://localhost/Fanimation/app/uploads/default-image.jpg';

            // Display two images
            $firstImage = !empty($imageUrls[0]) ? $base_url . trim($imageUrls[0]) : $defaultImage;
            $secondImage = !empty($imageUrls[1]) ? $base_url . trim($imageUrls[1]) : $defaultImage;

            echo '<div class="image-container">';
            echo '<a href="http://localhost/Fanimation/shop/views/product/product_detail.php?id=' . $productId . '">';
            echo '<img src="' . $firstImage . '" alt="' . $productName . '" class="product-image default-image" onerror="this.onerror=null; this.src=\'' . $defaultImage . '\';">';
            echo '<img src="' . $secondImage . '" alt="' . $productName . '" class="product-image hover-image" onerror="this.onerror=null; this.src=\'' . $defaultImage . '\';">';
            echo '</a>';

            // Thumbnails
            if (count($imageUrls) > 1) {
                echo '<div class="thumbnail-container">';
                foreach ($imageUrls as $imageUrl) {
                    $thumbImage = $base_url . trim($imageUrl);
                    echo '<img src="' . $thumbImage . '" alt="' . $productName . '" class="thumbnail" onclick="changeMainImage(\'' . $thumbImage . '\')">';
                }
                echo '</div>';
            }

            // Quick View button
            echo '<button class="quick-view" onclick=\'openQuickView(' . json_encode($productId) . ', ' . json_encode($productName) . ', ' . json_encode($product['price']) . ', ' . json_encode($productDescription) . ', ' . json_encode($productColor) . ', "' . $firstImage . '");\'>Quick View</button>';
            echo '</div>';

            echo '<h2>' . $productName . '</h2>';
            echo '<p class="product-price">Price: ' . number_format($product['price'], 0, ',', '.') . ' $</p>';
            echo '</div>'; // Close product-card
        }

        echo '</div>'; // Close product-container

        // Pagination
        $totalPages = ceil($totalProducts / $limit);
        echo '<div class="pagination-container">'; // Add a container for pagination
        echo '<div class="pagination">';
        echo '<a href="?page=1" class="' . ($page == 1 ? 'active' : '') . '">Previous</a> ';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '" class="' . ($i == $page ? 'active' : '') . '">' . $i . '</a> ';
        }
        echo '<a href="?page=' . $totalPages . '" class="' . ($page == $totalPages ? 'active' : '') . '">Next</a>';
        echo '</div>';
        echo '</div>'; // Close pagination-container

    } else {
        echo '<p>No products available in this category.</p>';
    }
} else {
    echo '<p>Unable to retrieve category list.</p>';
}

?>

<!-- Modal structure for Quick View -->
<div id="quickViewModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeQuickView()">&times;</span>
        <div class="modal-body">
            <div class="modal-image">
                <img id="quickViewImage" src="" alt="Product Image">
                <div id="image-thumbnails" class="thumbnails"></div>
            </div>
            <div class="modal-details">
                <h2 id="quickViewName"></h2>
                <p id="quickViewPrice"></p>
                <p id="quickViewDescription"></p>
                <p id="quickViewColor"></p>
                <button id="addToCartButton" onclick="addToCart()">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<style>
    .accessories-title {
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 30px;
        margin-top: 70px;
        color: #333;
        font-family: 'Open+Sans', sans-serif;
    }
    .product-container {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 25px;
        padding: 40px 0;
        width: 100%;
    }

    .product-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        width: calc(20% - 25px);
        overflow: hidden;
        text-align: center;
        padding: 15px;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        cursor: pointer;
        box-sizing: border-box;
        margin-bottom: 25px;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        transition: opacity 0.4s ease;
    }

    .default-image {
        opacity: 1;
    }

    .hover-image {
        opacity: 0;
    }

    .image-container:hover .default-image {
        opacity: 0;
    }

    .image-container:hover .hover-image {
        opacity: 1;
    }

    .quick-view {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        text-align: center;
        line-height: 40px;
        font-size: 16px;
        opacity: 0;
        transition: opacity 0.4s ease, transform 0.4s ease;
        transform: translateY(100%);
        cursor: pointer;
        z-index: 2;
    }

    .image-container:hover .quick-view {
        opacity: 1;
        transform: translateY(0);
    }

    .product-price {
        font-weight: bold;
        font-size: 1.2em;
        color: #333;
        margin-top: 15px;
        font-family: 'Roboto', sans-serif;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 60%;
        max-width: 800px;
        margin: auto;
        display: flex;
        flex-direction: row;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
    }

    .modal-body {
        display: flex;
        justify-content: space-between;
    }

    .modal-image img {
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

    .modal-details {
        margin-left: 20px;
    }

    .modal-details h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .modal-details p {
        font-size: 18px;
        margin: 5px 0;
    }

    #addToCartButton {
        background-color: #364b59;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 15px;
        transition: background-color 0.3s;
    }

    #addToCartButton:hover {
        background-color:#2c3e50; /* Màu khi hover */
    }
    .pagination-container {
        text-align: center; /* Center the pagination */
        margin: 20px 0; /* Space above and below the pagination */
        clear: both; /* Đảm bảo phân trang không bị ảnh hưởng bởi các phần khác */
    }


    .pagination {
        display: inline-block; /* Align pagination items in a row */
    }

    .pagination a {
        margin: 0 5px; /* Adjust margin between page numbers */
        padding: 10px 15px; /* Adjust padding for page numbers */
        background-color: #f0f0f0;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a.active {
        background-color: #364b59;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }


</style>

<script>
    function openQuickView(productId, productName, productPrice, productDescription, productColor, productImage) {
        document.getElementById('quickViewImage').src = productImage;
        document.getElementById('quickViewName').innerText = "Product Name: " + productName;
        document.getElementById('quickViewPrice').innerText = "Price: " + productPrice + " $";
        document.getElementById('quickViewDescription').innerText = "Description: " + productDescription;

        // Kiểm tra nếu productColor trống, hiển thị "No color"
        if (!productColor || productColor.trim() === '') {
            document.getElementById('quickViewColor').innerText = "Color: No color";
        } else {
            document.getElementById('quickViewColor').innerText = "Color: " + productColor;
        }

        // Xóa các thumbnails hiện có
        const thumbnailContainer = document.getElementById('image-thumbnails');
        thumbnailContainer.innerHTML = ''; // Xóa nội dung cũ của container

        // Tạo thumbnails cho tất cả các hình ảnh
        const imageUrls = [productImage]; // Bổ sung thêm hình ảnh chính
        // Thêm các hình ảnh khác (nếu có)
        if (Array.isArray(imageUrls) && imageUrls.length > 1) {
            imageUrls.forEach(function (url, index) {
                const thumb = document.createElement('img');
                thumb.src = url;
                thumb.alt = "Thumbnail " + (index + 1);
                thumb.classList.add('thumbnail');
                thumb.onclick = function () {
                    document.getElementById('quickViewImage').src = url;
                };
                thumbnailContainer.appendChild(thumb);
            });
        }

        // Hiển thị modal
        var modal = document.getElementById("quickViewModal");
        modal.style.display = "flex";
    }

    function addToCart() {
        const productId = document.getElementById('quickViewName').innerText.split(': ')[1];

        alert(productId + " Product added to cart!");
    }
</script>

<?php
include '../../views/layout/footer.php';
?>
