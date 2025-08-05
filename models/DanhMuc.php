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

    public function getOneDanhMuc($id)
    {
        try {
            $sql = "SELECT * FROM category WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return null;
        }
    }

}