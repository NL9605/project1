<?php
header('Content-Type: application/json'); // Set the content type to JSON

// Include the database connection
include '../configs/database.php';
$conn = database();

try {
    $productId = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

    // Check if the product_id is valid
    if ($productId <= 0) {
        echo json_encode(['colors' => []]); // Return empty colors array
        exit;
    }

    // Fetch colors associated with the product
    $colorsQuery = "
        SELECT c.id, c.name, c.hex_value
        FROM product_colors pc
        JOIN colors c ON pc.color_id = c.id
        WHERE pc.product_id = :product_id;
    ";

    $stmt = $conn->prepare($colorsQuery);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the colors data as JSON
    echo json_encode(['colors' => $colors]);
} catch (PDOException $e) {
    // Handle any database errors
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
