<?php
class LienHe {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Hàm connectDB trả về PDO
    }

    public function luuLienHe($ten, $email, $tieu_de, $noi_dung) {
        $sql = "INSERT INTO contact (ten, email, tieu_de, noi_dung) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ten, $email, $tieu_de, $noi_dung]);
    }
}

