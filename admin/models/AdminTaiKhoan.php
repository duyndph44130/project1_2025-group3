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
            error_log("Lỗi getAllTaiKhoan: " . $e->getMessage());
            return [];
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
            error_log("Lỗi getDetailTaiKhoan: " . $e->getMessage());
            return null;
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
            error_log("Lỗi insertTaiKhoan: " . $e->getMessage());
            return false;
        }
    }

    public function updateTaiKhoan($id, $ten, $email, $dien_thoai, $ho, $dia_chi, $thanhpho, $vai_tro, $ngay_capnhat) {
        try {
            $sql = "UPDATE user 
                    SET ten = :ten, email = :email, dien_thoai = :dien_thoai,
                        ho = :ho, dia_chi = :dia_chi, thanhpho = :thanhpho,
                        vai_tro = :vai_tro, ngay_capnhat = :ngay_capnhat
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':thanhpho', $thanhpho);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi updateTaiKhoan: " . $e->getMessage());
            return false;
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
            error_log("Lỗi resetPassword: " . $e->getMessage());
            return false;
        }
    }

    public function updateKhachHang($id, $ten, $email, $dien_thoai, $dia_chi, $thanhpho) {
        try {
            $sql = "UPDATE user 
                    SET ten = :ten, email = :email, dien_thoai = :dien_thoai,
                        dia_chi = :dia_chi, thanhpho = :thanhpho 
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':thanhpho', $thanhpho);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi updateKhachHang: " . $e->getMessage());
            return false;
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
                return [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'ten' => $user['ten'],
                    'vai_tro' => $user['vai_tro']
                ];
            }

            return false;
        } catch (PDOException $e) {
            error_log("Lỗi checkLogin: " . $e->getMessage());
            return false;
        }
    }

    public function deleteTaiKhoan($id) {
            try {
                $sql = "DELETE FROM user WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log("Lỗi deleteTaiKhoan: " . $e->getMessage());
                return false;
            }
    }
}
