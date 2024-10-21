<?php
include_once "../../controllers/CustomerController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $customerController = new CustomerController();
    $result = $customerController->signup($username, $password, $email, $phone, $address);

    // Xử lý kết quả
    if ($result) {
        echo "<div style='color: red;'>$result</div>";
    } else {
        echo "Sign up successful!";
    }
}
?>
