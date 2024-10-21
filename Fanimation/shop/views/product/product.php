<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List_Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Container cho toàn bộ filter */
        .filter-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            margin-top: 80px;
            margin-left: 20px; /* Thêm margin để tạo khoảng cách bên trái */
        }

        /* Hiển thị các bộ lọc theo chiều ngang */
        #filters {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 20px; /* Khoảng cách giữa các bộ lọc */
            flex-wrap: wrap; /* Để các bộ lọc tự ngắt dòng nếu không đủ chỗ */
        }

        /* Title and subtitle styles */
        h1, h3 {
            font-weight: normal;
            margin: 0 0 10px 0; /* Loại bỏ margin mặc định phía trên */
        }

        /* Filter group styling để tạo khoảng cách giữa các phần */
        .filter-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            min-width: 150px; /* Đặt chiều rộng tối thiểu cho từng nhóm bộ lọc */
        }

        /* Styling cho range slider */
        input[type="range"] {
            width: 100%;
        }

        /* Button styles */
        button {
            background-color: #f4f4f4;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        /* Button hover effect */
        button:hover {
            background-color: #e9eaed;
        }

        /* Dropdown và slider spacing */
        select, input[type="range"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        /* Style cho toggle filter button */
        #toggle-filter-btn {
            margin-bottom: 20px;
        }

        /* Khu vực hiển thị sản phẩm */
        #product-display {
            margin-top: 20px;
        }

        /* Căn các danh mục theo chiều ngang */
        .category-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .category-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 150px;
            padding: 10px;
        }

        /* Thay đổi style khi hover vào số lượng sản phẩm */
        .category-option:hover .product-count {
            background-color: #364b59;
            color: white;
            padding: 5px;
            border-radius: 50%;
            min-width: 30px;
            min-height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Custom checkbox styles */
        .custom-checkbox {
            display: none; /* Ẩn checkbox gốc */
        }

        .custom-checkmark {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 3px;
            margin-right: 10px;
            vertical-align: middle;
            position: relative;
            text-align: center;
        }

        /* Thay đổi trạng thái của checkbox khi được chọn */
        .custom-checkbox:checked + .custom-checkmark {
            background-color: #364b59;
            border-color: #364b59;
        }

        .custom-checkbox:checked + .custom-checkmark:after {
            content: '';
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        /* Thanh trượt giá */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background: #364b59;
            border-radius: 5px;
            outline: none;
        }

        /* Thay đổi màu sắc cho núm kéo */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #a4a59e;
            cursor: pointer;
        }

        /* Thay đổi màu sắc cho núm kéo trong Firefox */
        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #a4a59e;
            cursor: pointer;
        }

        /* Custom button */
        button {
            background-color: #f4f4f4;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #e9eaed; /* Màu nền khi hover */
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 cột mỗi hàng */
            gap: 20px; /* Khoảng cách giữa các sản phẩm */
            margin: 20px auto 0 auto;
            padding: 20px;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%; /* Chiếm toàn bộ chiều rộng của cột lưới */
            height: auto;
            overflow: hidden;
            position: relative;
            text-align: center;
            padding: 10px;
            margin: 0;
            transition: transform 0.3s ease;
            cursor: pointer;
            box-sizing: border-box; /* Bao gồm padding và border trong width */
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-images {
            position: relative;
            width: 100%;
            height: 270px;
            margin-bottom: 10px;
        }

        .product-images img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
            transform: translateX(-100%);
        }

        .product-card:hover .quick-view {
            opacity: 1;
            transform: translateX(0);
        }

        h2 {
            font-size: 1.1rem;
            margin: 5px 0;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price {
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
        }

        /* Modal styles (giữ nguyên) */
        .modal {
            display: none; /* Bắt đầu với trạng thái ẩn */
            position: fixed; /* Đảm bảo modal luôn cố định trên màn hình */
            z-index: 1000; /* Đảm bảo modal hiển thị trên tất cả các nội dung khác */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Làm tối phần nền */
            overflow: auto; /* Đảm bảo nội dung modal có thể cuộn nếu vượt quá chiều cao màn hình */
        }

        .modal-content {
            display: flex;
            flex-direction: row;
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 1200px;
            height: auto;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-right: 30px;
        }

        #modal-product-image {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .modal-right {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        #modal-product-name {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        #modal-product-description {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        #modal-product-price {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 30px;
        }

        .color-box {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .color-name {
            font-size: 1rem;
            margin-top: 10px;
        }

        .thumbnails {
            display: flex;
            flex-direction: row;
            margin-top: 15px;
            overflow-x: auto;
        }

        .thumbnails button {
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border-color 0.3s ease;
            width: 80px;
            height: 80px;
            margin-right: 5px;
            background-size: cover;
            background-position: center;
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .thumbnails button:hover {
            border-color: #354B59;
        }

        .add-to-cart-btn {
            background-color: #354B59;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
        }

        .add-to-cart-btn:hover {
            background-color: #133447;
            transform: scale(1.05);
        }

        .add-to-cart-btn:active {
            transform: scale(0.98);
        }

        /* Thêm style cho phân trang */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #354B59;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .pagination a.active {
            background-color: #354B59;
            color: white;
            border-color: #354B59;
        }

        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .color-box {
            width: 30px;
            height: 30px;
            display: inline-block;
            border: 1px solid #000;
            margin: 5px;
            cursor: pointer;
        }



        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .product-container {
                grid-template-columns: repeat(4, 1fr); /* 4 cột mỗi hàng */
            }
        }

        @media (max-width: 992px) {
            .product-container {
                grid-template-columns: repeat(3, 1fr); /* 3 cột mỗi hàng */
            }
        }

        @media (max-width: 768px) {
            .product-container {
                grid-template-columns: repeat(2, 1fr); /* 2 cột mỗi hàng */
            }
        }

        @media (max-width: 576px) {
            .product-container {
                grid-template-columns: 1fr; /* 1 cột mỗi hàng */
            }
        }

    </style>
</head>
<body>
<?php include '../views/layout/header.php'; ?>

<div id="filter-container" class="filter-container">
    <button id="toggle-filter-btn">Show Filter</button>
    <div id="filters" style="display: none;">

        <!-- Product Category with product count -->
        <h3>Product categories</h3>
        <div id="category-filter"></div>

        <!-- Color as checkboxes -->
        <h3>Colors</h3>
        <div id="color-filter">
            <label>
                <input type="checkbox" value="Antique graphite" class="custom-checkbox">
                <span class="custom-checkmark"></span> Antique Graphite
            </label><br>
            <label>
                <input type="checkbox" value="Brushed satin brass" class="custom-checkbox">
                <span class="custom-checkmark"></span> Brushed Satin Brass
            </label><br>
            <label>
                <input type="checkbox" value="Dark bronze" class="custom-checkbox">
                <span class="custom-checkmark"></span> Dark Bronze
            </label><br>
            <!-- More colors... -->
        </div>

        <h3>Sizes</h3>
        <div id="size-filter">
            <label>
                <input type="checkbox" value="under-48" class="custom-checkbox">
                <span class="custom-checkmark"></span> Under 48 inches
            </label><br>
            <label>
                <input type="checkbox" value="49-60" class="custom-checkbox">
                <span class="custom-checkmark"></span> 49 - 60 inches
            </label><br>
            <label>
                <input type="checkbox" value="larger-60" class="custom-checkbox">
                <span class="custom-checkmark"></span> Larger than 60 inches
            </label><br>

        </div>

        <!-- Price slider -->
        <h3>Price</h3>
        <input type="range" id="price-filter" min="0" max="9000" value="4000" step="100" />
        <span id="selected-price">4,000</span> $

        <button id="apply-filters">Apply Filters</button>
    </div>
</div>

<div id="product-display"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch categories and display them with product counts
        fetchCategories();

        // Fetch categories from the server
        function fetchCategories() {
            fetch('http://localhost/Fanimation/shop/api/get-number-categories.php')
                .then(response => response.json())
                .then(categories => displayCategories(categories))
                .catch(error => console.error('Error fetching categories:', error));
        }

        // Display the categories dynamically with product count
        function displayCategories(categories) {
            const categoryFilterContainer = document.getElementById('category-filter');
            categoryFilterContainer.innerHTML = ''; // Clear current content

            // Tạo một thẻ div mới để chứa các danh mục
            const categoryWrapper = document.createElement('div');
            categoryWrapper.className = 'category-wrapper'; // Thêm class cho dễ dàng quản lý CSS

            categories.forEach(category => {
                const categoryElement = document.createElement('div');
                categoryElement.className = 'category-option';
                categoryElement.setAttribute('data-category', category.category_name);
                categoryElement.innerHTML = `
            ${category.category_name} <span class="product-count">${category.product_count}</span>
        `;
                categoryWrapper.appendChild(categoryElement);

                // Add hover event for filtering
                categoryElement.addEventListener('mouseenter', function () {
                    const selectedCategory = this.getAttribute('data-category');
                    fetchFilteredProducts(selectedCategory, [], [], 9000); // Fetch products for the hovered category
                });
            });

            // Thêm categoryWrapper vào categoryFilterContainer
            categoryFilterContainer.appendChild(categoryWrapper);
        }


        // Fetch filtered products based on category, colors, sizes, and price
        function fetchFilteredProducts(category, colors, sizes, maxPrice) {
            const url = `http://localhost/Fanimation/shop/api/get-products.php?category=${encodeURIComponent(category)}&colors=${encodeURIComponent(colors.join(','))}&sizes=${encodeURIComponent(sizes.join(','))}&maxPrice=${maxPrice}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(products => displayProducts(products))
                .catch(error => {
                    console.error('Error fetching products:', error);
                    // Display an error message to the user
                    const productsContainer = document.getElementById('product-display');
                    productsContainer.innerHTML = '<p>Failed to load products. Please try again later.</p>';
                });
        }

        // Display products dynamically
        function displayProducts(products) {
            const productsContainer = document.getElementById('product-display');
            productsContainer.innerHTML = ''; // Clear current content

            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'product';
                productElement.innerHTML = `
                    <h3>${product.product_name}</h3>
                    <p>${product.description}</p>
                    <p>Price: $${product.price}</p>
                    <img src="${product.image.split(',')[0]}" alt="${product.product_name}"> <!-- Show first image -->
                `;
                productsContainer.appendChild(productElement);
            });
        }

        // Price Filter
        const priceFilter = document.getElementById('price-filter');
        const selectedPrice = document.getElementById('selected-price');
        selectedPrice.textContent = priceFilter.value; // Initialize with default value

        priceFilter.addEventListener('input', function () {
            selectedPrice.textContent = this.value;
        });

        // Apply filters
        document.getElementById('apply-filters').addEventListener('click', function () {
            const category = document.querySelector('.category-option.selected')?.getAttribute('data-category') || '';
            const colorElements = document.querySelectorAll('#color-filter input[type="checkbox"]:checked');
            const sizeElements = document.querySelectorAll('#size-filter input[type="checkbox"]:checked');

            const colors = Array.from(colorElements).map(el => el.value);
            const sizes = Array.from(sizeElements).map(el => el.value);
            const maxPrice = parseFloat(priceFilter.value);

            fetchFilteredProducts(category, colors, sizes, maxPrice);
        });

        // Hover event for category filter
        document.querySelectorAll('.category-option').forEach(option => {
            option.addEventListener('mouseenter', function () {
                const category = this.getAttribute('data-category');
                document.querySelectorAll('.category-option').forEach(el => el.classList.remove('selected'));
                this.classList.add('selected');
                const colorElements = document.querySelectorAll('#color-filter input[type="checkbox"]:checked');
                const sizeElements = document.querySelectorAll('#size-filter input[type="checkbox"]:checked');

                const colors = Array.from(colorElements).map(el => el.value);
                const sizes = Array.from(sizeElements).map(el => el.value);
                const maxPrice = parseFloat(priceFilter.value);

                fetchFilteredProducts(category, colors, sizes, maxPrice);
            });
        });

        // Toggle filter visibility
        document.getElementById('toggle-filter-btn').addEventListener('click', function () {
            const filters = document.getElementById('filters');
            filters.style.display = filters.style.display === 'none' ? 'block' : 'none';
            this.textContent = filters.style.display === 'block' ? 'Hide Filter' : 'Show Filter';
        });
    });
</script>

<div class="product-container">
    <?php foreach ($products as $product):
        ?>
        <div class="product-card">
            <div class="product-images">
                <?php
                $productId = isset($product['product_id']) ? htmlspecialchars($product['product_id']) : '#';
                $productName = isset($product['product_name']) ? htmlspecialchars($product['product_name']) : 'Tên sản phẩm không có';
                $imageUrls = !empty($product['image']) ? explode(',', htmlspecialchars($product['image'])) : [];

                // Đường dẫn đến hình ảnh mặc định
                $defaultImage = 'http://localhost/Fanimation/app/uploads/default-image.jpg';
                ?>

                <?php if (!empty($imageUrls) && count($imageUrls) > 0): ?>
                    <?php
                    // Tạo URL hình ảnh đầy đủ cho hình ảnh đầu tiên
                    $firstImageUrl = 'http://localhost/Fanimation/app/' . htmlspecialchars(trim($imageUrls[0]));
                    ?>
                    <a href="http://localhost/Fanimation/shop/views/product/product_detail.php?id=<?php echo $productId; ?>">
                        <img src="<?php echo $firstImageUrl; ?>"
                             alt="<?php echo htmlspecialchars($productName . ' - Hình ảnh sản phẩm'); ?>"
                             onerror="this.onerror=null; this.src='<?php echo $defaultImage; ?>';"
                             data-hover-image="http://localhost/Fanimation/app/<?php echo htmlspecialchars(trim($imageUrls[1] ?? $defaultImage)); ?>">
                    </a>
                <?php else: ?>
                    <img src="<?php echo $defaultImage; ?>" alt="Hình ảnh không có"
                         onerror="this.onerror=null; this.src='<?php echo $defaultImage; ?>';">
                <?php endif; ?>
                <span class="quick-view"
                      data-name="<?php echo htmlspecialchars($productName); ?>"
                      data-description="<?php
                      $dataDescription = isset($product['description']) ? htmlspecialchars($product['description']) : 'Mô tả không có';
                      $lines = explode("\n", $dataDescription);
                      $formattedDescription = "";
                      foreach ($lines as $line) {
                          $formattedDescription .= '• ' . trim($line) . '<br>';
                      }
                      echo $formattedDescription;
                      ?>"
                      data-price="<?php echo number_format($product['price'], 0, ',', '.'); ?> $"
                      data-colors="<?php echo isset($product['colors']) ? htmlspecialchars($product['colors']) : ''; ?>"
                      data-image="<?php echo htmlspecialchars(implode(',', $imageUrls)); ?>"
                      data-product-id="<?php echo htmlspecialchars($productId); ?>">
                      Quick View
                    </span>

            </div>
            <h2><?php echo $productName; ?></h2>
            <p class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?> $</p>
        </div>
    <?php endforeach; ?>
</div>



<!-- Modal -->
<div id="quick-view-modal" class="modal" style="display:none;">

    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-left">
            <img id="modal-product-image" src="" alt="Product Image" />
            <div id="image-thumbnails" class="thumbnails"></div>
        </div>

        <div class="modal-right">
            <h2 id="modal-product-name"></h2>
            <p id="modal-product-description"></p>
            <p id="modal-product-price"></p>
            <p id="modal-product-discount-price"></p>
            <div id="modal-product-color" class="color-boxes"></div>
            <div class="color-name" id="selected-color-name"></div>
            <button class="add-to-cart-btn" onclick="addToCart('12345')">Add to cart</button>
            <div id="cart-message" style="color: green; margin-top: 10px; display: none;"></div>

        </div>

    </div>
</div>
<?php if ($totalPages > 1): ?>
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li><a href="?page=<?php echo $currentPage - 1; ?>">&laquo; Previous</a></li>
        <?php endif; ?>
        <?php
        // Xác định số trang hiển thị
        $maxLinks = 10;
        $start = max($currentPage - floor($maxLinks / 2), 1);
        $end = min($start + $maxLinks - 1, $totalPages);
        if ($end - $start + 1 < $maxLinks) {
            $start = max($end - $maxLinks + 1, 1);
        }

        for ($i = $start; $i <= $end; $i++): ?>
            <li><a href="?page=<?php echo $i; ?>" class="<?php echo ($i === $currentPage) ? 'active' : ''; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPages): ?>
            <li><a href="?page=<?php echo $currentPage + 1; ?>">Next &raquo;</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('quick-view-modal');
        const closeModal = document.querySelector('.close');
        const modalProductName = document.getElementById('modal-product-name');
        const modalProductDescription = document.getElementById('modal-product-description');
        const modalProductPrice = document.getElementById('modal-product-price');
        const modalProductDiscountPrice = document.getElementById('modal-product-discount-price');
        const modalProductImage = document.getElementById('modal-product-image');
        const modalProductColors = document.getElementById('modal-product-color');
        const selectedColorName = document.getElementById('selected-color-name');
        const thumbnailsContainer = document.getElementById('image-thumbnails');
        const cartMessage = document.getElementById('cart-message');

        let selectedColor = null;

        // Handle "Quick View" button click
        document.querySelectorAll('.quick-view').forEach((quickView) => {
            quickView.addEventListener('click', async () => {
                const productId = quickView.getAttribute('data-product-id');
                const productName = quickView.getAttribute('data-name');
                const productDescription = quickView.getAttribute('data-description');
                const productPrice = parseFloat(quickView.getAttribute('data-price'));
                const productDiscount = parseFloat(quickView.getAttribute('data-discount')) || 0;
                const imageUrls = quickView.getAttribute('data-image').split(',');

                // Update modal content
                modalProductName.textContent = productName;
                modalProductDescription.innerHTML = productDescription;
                modalProductPrice.textContent = `Price: ${productPrice.toLocaleString()} $`;
                modalProductDiscountPrice.textContent = productDiscount ? `Promotional price: ${productDiscount.toLocaleString()} $` : '';
                modalProductImage.src = `http://localhost/Fanimation/app/${imageUrls[0]}`;
                thumbnailsContainer.innerHTML = '';

                imageUrls.forEach((url) => {
                    const thumbnail = document.createElement('img');
                    thumbnail.src = `http://localhost/Fanimation/app/${url}`;
                    thumbnail.className = 'thumbnail-image';
                    thumbnail.style.width = '50px';
                    thumbnail.style.height = '50px';
                    thumbnail.style.margin = '5px';

                    thumbnail.addEventListener('click', () => {
                        modalProductImage.src = `http://localhost/Fanimation/app/${url}`;
                    });

                    thumbnailsContainer.appendChild(thumbnail);
                });

                // Fetch product colors
                try {
                    const response = await fetch(`http://localhost/Fanimation/shop/api/product_colors.php?product_id=${productId}`);
                    const data = await response.json();

                    // Display colors
                    modalProductColors.innerHTML = '';
                    selectedColor = null;
                    if (data.colors && data.colors.length > 0) {
                        data.colors.forEach(color => {
                            const colorBox = document.createElement('div');
                            colorBox.className = 'color-box';
                            colorBox.style.backgroundColor = color.hex_value;
                            colorBox.title = color.name;

                            colorBox.addEventListener('click', () => {
                                selectedColor = color.name;
                                selectedColorName.textContent = `Selected color: ${color.name}`;
                            });

                            modalProductColors.appendChild(colorBox);
                        });
                        selectedColorName.textContent = 'Choose color:';
                    } else {
                        selectedColorName.textContent = 'No colors available.';
                    }
                } catch (error) {
                    console.error('Error fetching colors:', error);
                    selectedColorName.textContent = 'Error fetching colors.';
                }

                // Show the modal
                modal.style.display = 'block';

                // Handle Add to Cart
                const addToCartBtn = document.querySelector('.add-to-cart-btn');
                addToCartBtn.onclick = () => {
                    if (selectedColor === null) {
                        alert('Please select a color before adding to cart!');
                        return;
                    }
                    addToCart(productId, productName, productDiscount || productPrice, selectedColor);
                };
            });
        });

        // Close modal on clicking "X" or outside modal
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        function addToCart(productId, productName, productPrice, selectedColor) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProductIndex = cart.findIndex(item => item.id === productId && item.color === selectedColor);

            if (existingProductIndex !== -1) {
                cart[existingProductIndex].quantity += 1;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    color: selectedColor || 'No color',
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            cartMessage.textContent = `${productName} in color ${selectedColor} has been added to cart!`;
            cartMessage.style.display = 'block';

            setTimeout(() => {
                cartMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>

<?php include '../views/layout/footer.php'; ?>
</body>
</html>
