<?php 
class AdminLienHe {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy tất cả liên hệ
    public function getAllContacts() {
        $sql = "SELECT * FROM contact ORDER BY ngay_gui DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy liên hệ gần đây (mặc định 5)
    public function getLatest($limit = 5) {
        $sql = "SELECT * FROM contact ORDER BY ngay_gui DESC LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Xóa liên hệ theo ID
    public function deleteContact($id) {
        $sql = "DELETE FROM contact WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    // Xem chi tiết liên hệ
    public function getContactById($id) {
        $sql = "SELECT * FROM contact WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}