<?php

class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // hàm lấy danh sách all
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 0,15";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAll() '.$e->getMessage();
        }
    }

    public function getDetailProduct($id)
    {
        try {
            $sql = "SELECT product.*, category.name 
            FROM product 
            INNER JOIN category ON product.category_id = category.id 
            WHERE product.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailProduct() '.$e->getMessage();
        }
    }
    public function getProductCategory($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE 1 AND category_id=:id ORDER BY id DESC LIMIT 0,15";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi getProductCategory() '.$e->getMessage();
        }
    }

}
