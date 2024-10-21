<?php
function database()
{
    $host = "mysql:host=localhost:3306;dbname=Fan";
    $username = "root";
    $password = "HTTN9605dtl";

    try {
        // Establish the connection
        $conn = new PDO($host, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;  // Return the connection object
    } catch (PDOException $ex) {
        // Handle any connection errors
        echo "Connection failed: " . $ex->getMessage();
        exit;
    }
}
$conn = database();  // Assign the connection to $conn
?>
