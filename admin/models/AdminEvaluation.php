<?php class AdminEvaluation
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllEvaluation()
    {
        try {
            $sql = 'SELECT *FROM danh_gia';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }
    
    public function deleteEvaluation($dg_id)
    {
        try {
            $sql = "DELETE FROM danh_gia WHERE dg_id=:dg_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dg_id' => $dg_id
            ]);
           
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteUser() '.$e->getMessage();
        }
    }
}
?>