<?php class AdminComment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllComment()
    {
        try {
            $sql = 'SELECT *FROM binh_luan';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }
    
    public function deleteComment($bl_id)
    {
        try {
            $sql = "DELETE FROM binh_luan WHERE bl_id=:bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':bl_id' => $bl_id
            ]);
           
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteUser() '.$e->getMessage();
        }
    }
}
?>