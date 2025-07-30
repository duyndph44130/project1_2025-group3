<?php

class AdminDonHang {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllDonHang() {
        try {
            $sql = " SELECT o.*, COALESCE(SUM(ct.so_luong * ct.don_gia), 0) AS tong_tien
            FROM orders o LEFT JOIN chi_tiet_don_hang ct ON o.id = ct.id_donhang
            GROUP BY o.id ORDER BY o.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailDonHang($id) {
        try {
            $sql = "SELECT * FROM orders WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getListDonHang($id) {
        try {
            $sql = 'SELECT * FROM chi_tiet_don_hang INNER JOIN product ON chi_tiet_don_hang.id_san_pham = product.id WHERE chi_tiet_don_hang.id_donhang = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateDonHang($id, $ten, $dien_thoai, $email, $dia_chi, $vanchuyen_thanhpho, $trangthai)
    {
        try {
            $sql = "UPDATE orders
            SET ten = :ten, dien_thoai = :dien_thoai, email = :email, dia_chi = :dia_chi, vanchuyen_thanhpho = :vanchuyen_thanhpho, trangthai = :trangthai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
            $stmt->bindParam(':dien_thoai', $dien_thoai, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':dia_chi', $dia_chi, PDO::PARAM_STR);
            $stmt->bindParam(':vanchuyen_thanhpho', $vanchuyen_thanhpho, PDO::PARAM_STR);
            $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDonHangFromKhachHang ($id_KH) {
        try {
            $sql = "SELECT * FROM orders WHERE id_KH = :id_KH";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_KH', $id_KH, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateTrangThaiDonHang($id, $trangthai) {
        try {
            $sql = "UPDATE orders SET trangthai = :trangthai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getLatest($limit = 5) {
        try {
            $sql = "SELECT o.*, SUM(ct.so_luong * ct.gia) AS tong_tien
            FROM orders o
            LEFT JOIN chi_tiet_don_hang ct ON o.id = ct.id_donhang
            GROUP BY o.id
            ORDER BY o.ngay_dathang DESC
            LIMIT :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getLatest: " . $e->getMessage());
            return [];
        }
    }

}