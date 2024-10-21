<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./shop/assets/css/home.css">
    <title>SlideShow</title>
</head>
<body>
<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 50px;
    }

    /* Mỗi sản phẩm */
    .product-item {
        border-radius: 8px; /* Bo góc cho sản phẩm */
        padding: 23px;
        margin: 10px;
        width: calc(20% - 20px); /* Hiển thị 5 sản phẩm trên mỗi hàng */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng cho sản phẩm */
        transition: transform 0.3s;
        background-color: #fff; /* Màu nền trắng cho sản phẩm */
    }

    /* Hiệu ứng hover cho sản phẩm */
    .product-item:hover {
        transform: scale(1.05);
    }

    /* Tiêu đề sản phẩm */
    .product-item h2 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333; /* Màu chữ tối cho tiêu đề */
    }

    /* Mô tả sản phẩm */
    .product-item p {
        font-size: 14px;
        color: #555;
    }

    /* Giá sản phẩm */
    .product-item p:last-child {
        font-weight: bold;
        color: black; /* Màu chữ cho giá */
    }

    /* Liên kết hình ảnh */
    .product-image-link {
        display: block; /* Để làm cho hình ảnh có thể nhấp được */
    }

    /* Hình ảnh sản phẩm */
    .product-item img {
        width: 250px; /* Chiều rộng hình ảnh */
        height: 300px; /* Chiều cao hình ảnh */
        object-fit: cover; /* Cắt hình ảnh để đảm bảo nó luôn vuông */
        background-color: #fff; /* Màu nền trắng cho hình ảnh */
        border-radius: 4px; /* Bo góc cho hình ảnh */
        transition: transform 0.3s; /* Hiệu ứng hover cho hình ảnh */
    }

    /* Hiệu ứng hover cho hình ảnh */
    .product-item img:hover {
        transform: scale(1.05); /* Phóng to khi di chuột qua */
    }

    /* Phần hiển thị chi tiết sản phẩm */
    .product-images {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }

    .product-images img {
        width: 100%; /* Đảm bảo hình ảnh không vượt quá chiều rộng */
        height: auto; /* Chiều cao tự động cho hình ảnh trong chi tiết */
        margin-top: 10px;
        border-radius: 4px; /* Bo góc cho hình ảnh */
    }


    /* Responsive cho di động */
    @media (max-width: 1024px) {
        .product-item {
            width: calc(33.33% - 20px); /* Hiển thị 3 sản phẩm trên mỗi hàng */
        }
    }

    @media (max-width: 768px) {
        .product-item {
            width: calc(50% - 20px); /* Hiển thị 2 sản phẩm trên mỗi hàng */
        }
    }

    @media (max-width: 480px) {
        .product-item {
            width: 100%; /* Hiển thị 1 sản phẩm trên mỗi hàng */
        }
    }
</style>
<div class="slide-show">
    <div class="list-image">
        <div class="slide active"> <!-- Thêm lớp active cho slide đầu tiên -->
            <img src="./shop/images/3.jpg" width="100%" alt="">
            <div class="text-overlay">
                <h3>New for 2024</h3>
                <h1>A collection with a Fan for Every space</h1>
                <a href="http://localhost/Fanimation/shop/controllers/ProductController.php" class="learn-more-btn">Learn More</a>
            </div>
        </div>
        <div class="slide">
            <img src="./shop/images/7.jpg" width="100%" alt="">
            <div class="text-overlay">
                <h3>TriAire</h3>
                <h1>Two of your favourite finishes now available in Marine Grade</h1>
                <a href="http://localhost/Fanimation/shop/controllers/ProductController.php" class="learn-more-btn">Learn More</a>
            </div>
        </div>
        <div class="slide">
            <img src="./shop/images/22.jpg" width="100%" alt="">
            <div class="text-overlay">
                <h3>Wrap</h3>
                <h1>Brush satin brass + Matte white</h1>
                <a href="http://localhost/Fanimation/shop/controllers/ProductController.php" class="learn-more-btn">Learn More</a>
            </div>
        </div>
        <div class="slide">
            <img src="./shop/images/23.jpg" width="100%" alt="">
            <div class="text-overlay">
                <h3>Neutral & Now</h3>
                <h1>Featuring the new Antique Graphite finish with new Light Oak finish Blades</h1>
                <a href="http://localhost/Fanimation/shop/controllers/ProductController.php" class="learn-more-btn">Learn More</a>
            </div>
        </div>
    </div>
    <div class="btns-left btn">❮</div>
    <div class="btns-right btn">❯</div>
    <div class="index-image">
        <div class="index-item index-item-0 active"></div>
        <div class="index-item index-item-1"></div>
        <div class="index-item index-item-2"></div>
        <div class="index-item index-item-3"></div>
    </div>
    <script src="./shop/assets/js/home.js"></script>
</div>
</div>
<div class="wrap-image">
    <div class="introduction">
        <p>Fanimation fans are the perfect fusion of beauty and functionality. With designs for every
            </br>style and technology-driven controls for your convenience, Fanimation fans inspire your home. </br>
            They integrate into any space and allow you to make a statement that is all your own.
        </p>
    </div>
    <div class="list">
        <div class="row-1">
            <div class="ceilingfan">
                <div class="img-container">
                    <a href="http://localhost/Fanimation/shop/views/categories/ceiling-fans.php"> <!-- Thay đổi ID sản phẩm -->
                        <img src="./shop/images/Remove-bg.ai_1728388796796.png" alt="">
                        <p>Ceiling Fans</p>
                    </a>
                </div>
            </div>
            <div class="pedestialfan">
                <div class="img-container">
                    <a href="http://localhost/Fanimation/shop/views/categories/pedestal-fans.php"> <!-- Thay đổi ID sản phẩm -->
                        <img src="./shop/images/gg.png" alt="">
                        <p>Pedestal Fans</p>
                    </a>
                </div>
            </div>
            <div class="wallfan">
                <div class="img-container">
                    <a href="http://localhost/Fanimation/shop/views/categories/wall-fans.php"> <!-- Thay đổi ID sản phẩm -->
                        <img src="./shop/images/gg4ez.png" alt="">
                        <p>Wall Fans</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row-2">
            <div class="exhaustfan">
                <div class="img-container">
                    <a href="http://localhost/Fanimation/shop/views/categories/exhaust-fans.php"> <!-- Thay đổi ID sản phẩm -->
                        <img src="./shop/images/Remove-bg.ai_1728333774158.png" alt="">
                        <p>Exhaust Fans</p>
                    </a>
                </div>
            </div>
            <div class="accessories">
                <div class="img-container">
                    <a href="http://localhost/Fanimation/shop/views/categories/accessories.php"> <!-- Thay đổi ID sản phẩm -->
                        <img src="./shop/images/Remove-bg.ai_1728332740308.png" alt="">
                        <p>Accessories</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="aboutus">
    <img src="./shop/images/gg3ez.jpg" alt="">
    <div class="text">
        <h2>ABOUT US</h2>
        <h1>Air</br>Apparent</h1>
        <p>From the very first fan we created</br>more than 30 years ago to the</br>newest ones in our portfolio, we</br>create fans you can’t wait to show</br>off! The same ingenuity and quality</br>craftsmanship that gave birth to</br>Fanimation continues to guide us</br>today.</p>
    </div>
</div>
<h1 style="text-align:center;">BEST SELLER</h1>
<?php
// Dữ liệu JSON
$jsonData = '[{"product_id":53,"product_name":"PCDC + Light","category_id":1,"size_id":2,"description":"Wet Rated\r\n52\u2033 Sweep Blades included\r\nPull Chain","discount_id":null,"price":"320","image":"uploads\/671337eb08583_PCDC_main.jpg,uploads\/671337eb08c22_PCDC_matte-white.jpg,uploads\/671337eb08d62_PCDC_silver.jpg"},{"product_id":60,"product_name":"Punkah","category_id":3,"size_id":6,"description":"22-INCH PUNKAH WIDE OVAL PALM BLADE SET","discount_id":null,"price":"100","image":"uploads\/67133b987a01f_punkah1.jpg,uploads\/67133ba689c3e_punkah_rmshot_1.jpg,uploads\/67133ba68a060_punkah.jpg"},{"product_id":65,"product_name":"LK6721B** Spitfire Light Kit","category_id":5,"size_id":5,"description":"For use with the Spitfire\u2122 only\r\n18W dimmable LED\r\nRecommended for use in damp locations","discount_id":null,"price":"100","image":"uploads\/67134b5a8fdd4_LK6721BDC.jpg,uploads\/67134b5a90376_LK6721BDC1.jpg,uploads\/67134b5a9046a_LK6721BDC2.jpg,uploads\/67134b5a90558_LK6721BDC3.jpg,uploads\/67134b5a9062e_LK6721BDC5.jpg,uploads\/67134b5a90705_LK6721BDC6.jpg,uploads\/67134b5a907e4_LK6721BDC7.jpg"},{"product_id":61,"product_name":"Retro Breeze","category_id":2,"size_id":5,"description":"Dry Rated\r\n5.5\u2033 power cord\r\nRotary 3-Speed Control","discount_id":null,"price":"120","image":"uploads\/67133bd9eb376_Retro Breeze.jpg,uploads\/67133bd9eb933_Retro Breeze1.jpg"},{"product_id":51,"product_name":"EightyFour","category_id":1,"size_id":4,"description":"Fanimation Studio Collection EightyFour 84-in Brushed Nickel Color-changing Integrated LED Indoor\/Outdoor Ceiling Fan with Light and Remote (9-Blade)","discount_id":null,"price":"400","image":"uploads\/6713363a01321_EightyFour_brushed-nikled.jpg,uploads\/6713364a106d2_EightyFour_main.jpg,uploads\/6713364a1087a_EightyFour_mattewhite.jpg,uploads\/671336636a71f_EightyFour_info.jpg"}]';


$products = json_decode($jsonData, true);

// Kiểm tra nếu có sản phẩm
if ($products) {
    echo "<div class='product-list'>";
    foreach ($products as $product) {
        // Hiển thị thông tin sản phẩm
        echo "<div class='product-item'>";

        // Liên kết đến trang chi tiết sản phẩm
        echo "<a href='product-detail.php?id=" . htmlspecialchars($product['product_id']) . "' class='product-image-link'>";

        // Hiển thị hình ảnh sản phẩm
        $images = explode(',', $product['image']);
        echo "<img src='http://localhost/Fanimation/app/" . htmlspecialchars($images[0]) . "' alt='" . htmlspecialchars($product['product_name']) . "' />";
        echo "</a>";

        echo "<h2>" . htmlspecialchars($product['product_name']) . "</h2>";
        echo "<p>Price: $" . htmlspecialchars($product['price']) . "</p>";
        echo "</div>"; // Kết thúc product-item
    }
    echo "</div>"; // Kết thúc product-list
} else {
    echo "No products found.";
}

?>


</body>
</html>
