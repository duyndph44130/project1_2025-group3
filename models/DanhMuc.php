<?php
class DanhMuc {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM category");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    public function getOneDanhMuc($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM category WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
