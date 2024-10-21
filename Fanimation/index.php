<?php
session_start();
include_once "./shop/views/layout/header.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include_once "./shop/views/layout/home.php";
        break;
    case 'product':
        include_once "./shop/views/product/product.php";
        break;
    default:
        include_once "./shop/views/layout/home.php";
}

include_once "./shop/views/layout/footer.php";
?>
