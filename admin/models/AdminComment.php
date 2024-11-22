<?php class AdminComment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Phương thức để ẩn bình luận
    public function hideComment($bl_id)
    {
        try {
            $sql = "UPDATE binh_luan SET an_hien = 0 WHERE bl_id = :bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bl_id' => $bl_id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi hideComment(): ' . $e->getMessage();
            return false;
        }
    }

    // Phương thức để hiển thị bình luận
    public function showComment($bl_id)
    {
        try {
            $sql = "UPDATE binh_luan SET an_hien = 1 WHERE bl_id = :bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bl_id' => $bl_id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi showComment(): ' . $e->getMessage();
            return false;
        }
    }

    // Phương thức lấy tất cả bình luận
    public function getAllComment()
    {
        try {
            $sql = 'SELECT * FROM binh_luan';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllComment(): ' . $e->getMessage();
        }
    }
}

?>