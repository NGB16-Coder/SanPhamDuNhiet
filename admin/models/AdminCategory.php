<?php

class AdminCategory
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllCategory()
    {
        try {
            $sql = "SELECT * FROM danh_muc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllCategory() '.$e->getMessage();
        }
    }

    public function insertCategory($ten_dm)
    {
        try {
            $sql = "INSERT INTO danh_muc(ten_dm) VALUES(:ten_dm)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_dm' => $ten_dm
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insertCategory() '.$e->getMessage();
        }
    }

    public function getDetailCategory($id)
    {
        try {
            $sql = "SELECT * FROM danh_muc WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailCategory() '.$e->getMessage();
        }
    }

    public function updateCategory($id, $name)
    {
        try {
            $sql = "UPDATE danh_muc SET name=:name WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi updateCategory() '.$e->getMessage();
        }
    }

    public function deleteCategory($id)
    {
        try {
            $sql = "DELETE FROM danh_muc WHERE id=:id AND cate";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteCategory() '.$e->getMessage();
        }
    }
}
