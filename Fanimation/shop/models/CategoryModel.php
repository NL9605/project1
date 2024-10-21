<?php
namespace models;

class CategoryModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to get all categories
    public function getCategories() {
        $query = "SELECT * FROM Categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
