<?php 
class DanhMuc {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc() {
        try {
            $sql = "SELECT * FROM category";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }
}