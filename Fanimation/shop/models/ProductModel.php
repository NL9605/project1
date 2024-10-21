<?php
namespace models;

class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Hàm lấy tổng số sản phẩm
    public function getTotalProducts($search = '') {
        $query = "SELECT COUNT(*) as total FROM Products";
        if ($search) {
            $query .= " WHERE LOWER(product_name) LIKE LOWER(:search)";  // Sửa để tìm không phân biệt hoa thường
        }
        $stmt = $this->conn->prepare($query);

        if ($search) {
            $stmt->bindValue(':search', "%$search%", \PDO::PARAM_STR);  // Tìm kiếm chứa chữ cái bất kỳ vị trí nào
        }

        $stmt->execute();
        $row = $stmt->fetch();
        return $row['total'];
    }

    public function getProductsByPage($limit, $offset, $search = '') {
        $query = "SELECT * FROM products LIMIT :limit OFFSET :offset";
        if ($search) {
            $query = "SELECT * FROM products WHERE product_name LIKE :search LIMIT :limit OFFSET :offset";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

        if ($search) {
            $stmt->bindValue(':search', "%$search%");
        }

        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Chỉ trả về kết quả, không in ra
        return $results;
    }
    // Hàm lấy chi tiết sản phẩm theo ID
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getRandomProducts($limit = 5)
    {
        $query = "SELECT * FROM products ORDER BY RAND() LIMIT :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }



}
