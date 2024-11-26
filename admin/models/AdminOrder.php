<?php

class AdminOrder
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllOrder()
    {
        try {
            $sql = 'SELECT * FROM don_hang';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error in getAllOrder(): ' . $e->getMessage());
            return [];
        }
        
    }

    public function insertOrder($order_id, $tk_id, $dia_chi, $ten_nhan, $sdt, $ngay_dat, $tong_so_luong, $trang_thai, $tong_tien, $an_hien, $ngay_tao, $ngay_update)
    {
        try {
            $sql = "INSERT INTO orders (order_id, tk_id, dia_chi, ten_nhan, sdt, ngay_dat, tong_so_luong, trang_thai, tong_tien, an_hien, ngay_tao, ngay_update) 
                    VALUES (:order_id, :tk_id, :dia_chi, :ten_nhan, :sdt, :ngay_dat, :tong_so_luong, :trang_thai, :tong_tien, :an_hien, :ngay_tao, :ngay_update)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id,
                ':tk_id' => $tk_id,
                ':dia_chi' => $dia_chi,
                ':ten_nhan' => $ten_nhan,
                ':sdt' => $sdt,
                ':ngay_dat' => $ngay_dat,
                ':tong_so_luong' => $tong_so_luong,
                ':trang_thai' => $trang_thai,
                ':tong_tien' => $tong_tien,
                ':an_hien' => $an_hien,
                ':ngay_tao' => $ngay_tao,
                ':ngay_update' => $ngay_update,
            ]);
            return true;
        } catch (Exception $e) {
            error_log('Error in insertOrder(): ' . $e->getMessage());
            return false;
        }
    }

    public function getDetailOrder($id)
    {
        try {
            $sql = "SELECT o.*, o.name 
                    FROM orders o 
                    INNER JOIN order_details od ON o.order_id = od.id 
                    WHERE o.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error in getDetailOrder(): ' . $e->getMessage());
            return null;
        }
    }
}
