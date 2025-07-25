<?php
class AdminTaiKhoan {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllTaiKhoan($vai_tro) {
        try {
            $sql = "SELECT * FROM user WHERE vai_tro = :vai_tro";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailTaiKhoan($id) {
        try {
            $sql = "SELECT * FROM user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertTaiKhoan($ten, $ho, $dien_thoai, $dia_chi, $thanhpho, $ngay_capnhat, $email, $mat_khau, $vai_tro) {
        try {
            $sql = "INSERT INTO user (ten, ho, dien_thoai, dia_chi, thanhpho, ngay_capnhat, email, mat_khau, vai_tro) 
                    VALUES (:ten, :ho, :dien_thoai, :dia_chi, :thanhpho, :ngay_capnhat, :email, :mat_khau, :vai_tro)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':thanhpho', $thanhpho);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':vai_tro', $vai_tro);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateTaiKhoan($id, $ten, $email, $dien_thoai) {
        try {
            $sql = "UPDATE user SET ten = :ten, email = :email, dien_thoai = :dien_thoai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function resetPassword($id, $mat_khau) {
        try {
            $sql = "UPDATE user SET mat_khau = :mat_khau WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':mat_khau', $mat_khau);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateKhachHang($id, $ten, $email, $dien_thoai, $dia_chi, $thanhpho) {
        try {
            $sql = "UPDATE user SET ten = :ten, email = :email, dien_thoai = :dien_thoai, dia_chi = :dia_chi, thanhpho = :thanhpho WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':thanhpho', $thanhpho);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function checkLogin($email, $mat_khau) {
        try {
            $sql = "SELECT * FROM user WHERE email = :email AND vai_tro = 'admin' LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                return ['email' => $user['email'], 'vai_tro' => $user['vai_tro']];
            }
            return false;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
