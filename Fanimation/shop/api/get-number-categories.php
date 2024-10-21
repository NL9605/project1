<?php
// Database connection settings
$host = "localhost:3306";
$dbname = "Fan";
$username = "root";
$password = "HTTN9605dtl";

// Function to establish a database connection
function database() {
    global $host, $dbname, $username, $password;  // Use global variables
    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $ex) {
        // Handle connection failure
        echo json_encode(['error' => 'Connection failed: ' . $ex->getMessage()]);
        exit;
    }
}

// Establish the connection
$conn = database();

// Query to get categories and their product counts
$query = "
    SELECT c.category_id, c.category_name, COUNT(p.product_id) as product_count
    FROM categories c
    LEFT JOIN products p ON c.category_id = p.category_id
    GROUP BY c.category_id
";

// Prepare and execute the query
try {
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch results as an associative array
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode($categories);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}
?>
