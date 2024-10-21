<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <script src="https://kit.fontawesome.com/6ba0c41bed.js"></script>
    <title>Document</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
    }

    body {
        display: flex; /* Sử dụng Flexbox */
        flex-direction: column; /* Hướng cột cho các phần tử */
        min-height: 100vh; /* Đảm bảo chiều cao tối thiểu của body là 100% viewport */
        margin: 0; /* Xóa margin mặc định */
        background: white; /* Màu nền */
    }

    .content {
        flex: 1; /* Chiếm hết không gian còn lại giữa header và footer */
        padding: 20px; /* Padding cho nội dung chính */
    }

    footer {
        width: 100%;
        background: #ffffff; /* Màu nền trắng */
        color: #000000; /* Màu chữ đen */
        padding: 20px 0; /* Padding cho footer */
        font-size: 13px;
        line-height: 20px;
        text-align: left; /* Canh giữa nội dung footer */
    }
    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }

    .col {
        flex-basis: 25%;
        padding: 10px;
    }

    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }

    .email-id {
        width: fit-content;
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }

    .email-id a {
        color: #000; /* Change link color to black */
        text-decoration: none;
    }

    .tel a {
        color: #000; /* Change link color to black */
        text-decoration: none;
    }

    ul li {
        list-style: none;
        margin-bottom: 12px;
    }

    ul li a {
        text-decoration: none;
        color: #000; /* Change link color to black */
    }

    form {
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #ccc;
        margin-bottom: 50px;
    }

    form .far {
        font-size: 18px;
        margin-right: 10px;
    }

    form input {
        width: 100%;
        background: transparent;
        color: #000; /* Change input text color to black */
        border: 0;
        outline: none;
    }

    form button {
        background: transparent;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    form button .fas {
        font-size: 16px;
        color: #000; /* Change button icon color to black */
    }

    .social-icons .fab {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: #000; /* Change social icon color to black */
        background: #ffffff; /* Keep background white */
        margin-right: 15px;
        cursor: pointer;
    }

    hr {
        width: 90%;
        border: 0;
        border-bottom: 1px solid #ccc;
        margin: 20px auto;
    }

    .copyright {
        text-align: center;
    }

</style>
<footer>
    <div class="row">
        <div class="col">
            <img width="200" height="36" alt="Fanimation"
                 src="https://fanimation.com/wp-content/uploads/2021/04/Logo_white_1.png">
            <div class="footer-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.5666758322494!2d-86.25773348461992!3d39.949449879423465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b7bace7ee9e33%3A0x73aaf314d152e9fd!2s10983+Bennett+Pkwy%2C+Zionsville%2C+IN+46077%2C+USA!5e0!3m2!1sen!2s!4v1608642079776!5m2!1sen!2s" width="200" height="200" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        <div class="col">
            <h3>Office</h3>
            <p>10983 Bennett Parkway</p>
            <p>Zionsville, IN 46077</p>
            <p class="email-id"><a href="mailto:fanimation@gmail.com">fanimation@gmail.com</a></p>
            <h4 class="tel"><a href="tel:888.567.2055">888.567.2055</a></h4>
        </div>
        <div class="col">
            <h3>Links</h3>
            <ul>
                <li><a href="http://localhost/Fanimation/home.php">Home</a></li>
                <li><a href="http://localhost/Fanimation/shop/controllers/ProductController.php">Products</a></li>
                <li><a href="http://localhost/Fanimation/shop/views/about_us/aboutus.php">About Us</a></li>
                <li><a href="">Help Center</a></li>
            </ul>
        </div>
        <div class="col">
            <h3>Newsletter</h3>
            <form>
                <i class="far fa-envelope"></i>
                <input type="email" placeholder="Enter your email id" required>
                <button type="submit"><i class="fas fa-arrow-right"></i></button>
            </form>
            <div class="social-icons">
                <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/yourpage" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://wa.me/yourwhatsappnumber" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.pinterest.com/yourpage" target="_blank"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright">Fanimation (C) 2024 - All Rights Reserved</p>
</footer>
</body>
</html>