<?php
include_once "../../controllers/CustomerController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $customerController = new CustomerController();
    $result = $customerController->login($username, $password);

    // Xử lý kết quả
    if (is_array($result) && $result['message'] === "Login successfully!") {
        // Redirect to home page or dashboard after successful login
        header("Location: http://localhost/Fanimation/home.php"); // Adjust the path as necessary
        exit();
    } else {
        echo "<div style='color: red;'>".$result."</div>";
    }
}
?>
