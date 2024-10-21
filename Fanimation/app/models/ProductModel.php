<?php
class ProductModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getAllProducts() {
        $sql = "SELECT p.product_id, p.product_name, p.description, p.price, 
                       c.category_name, s.size_name, p.image
                FROM products AS p
                JOIN categories AS c ON p.category_id = c.category_id
                JOIN sizes AS s ON p.size_id = s.size_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($product_name, $description, $price, $category_id, $size_id, $discount_id, $image) {
        $sql = "INSERT INTO products (product_name, description, price, category_id, size_id, discount_id, image)
                VALUES (:product_name, :description, :price, :category_id, :size_id, :discount_id, :image)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':size_id', $size_id);
        $stmt->bindParam(':discount_id', $discount_id);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editProduct($id, $product_name, $description, $price, $category_id, $size_id, $discount_id, $image) {
        $sql = "UPDATE products SET 
                    product_name = :product_name, 
                    description = :description, 
                    price = :price, 
                    category_id = :category_id, 
                    size_id = :size_id, 
                    discount_id = :discount_id, 
                    image = :image 
                WHERE product_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':size_id', $size_id);
        $stmt->bindParam(':discount_id', $discount_id);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
