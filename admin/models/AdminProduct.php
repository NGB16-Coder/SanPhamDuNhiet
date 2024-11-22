<?php

class AdminProduct
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProduct()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm 
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function insertProduct($ten_sp, $price, $discount, $update_at, $category_id, $thumbnail, $description)
    {
        try {
            $sql = "INSERT INTO product(category_id, ten_sp, description, price, discount, thumbnail, update_at) 
                    VALUES(:category_id, :ten_sp,:description, :price, :discount, :thumbnail, :update_at)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':category_id' => $category_id,
                ':ten_sp' => $ten_sp,
                ':description' => $description,
                ':price' => $price,
                ':discount' => $discount,
                ':thumbnail' => $thumbnail,
                ':update_at' => $update_at,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insetProduct() '.$e->getMessage();
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

    public function updateProduct($ten_sp, $price, $discount, $update_at, $category_id, $thumbnail, $description, $id)
    {
        try {
            $sql = "UPDATE product SET ten_sp=:ten_sp, price=:price, discount=:discount, update_at=:update_at, category_id=:category_id, thumbnail=:thumbnail, description=:description WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':price' => $price,
                ':discount' => $discount,
                ':update_at' => $update_at,
                ':category_id' => $category_id,
                ':thumbnail' => $thumbnail,
                ':description' => $description,
                ':id' => $id

            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi UpdateProduct() '.$e->getMessage();
        }
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM product WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteProduct() '.$e->getMessage();
        }
    }
}
