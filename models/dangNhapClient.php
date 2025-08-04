<?php

class DangNhapClient
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkdangki($ho, $ten, $email, $mat_khau, $dien_thoai, $dia_chi, $thanhpho, $vai_tro, $ngay_capnhat) {
        try {
            $sql = "INSERT INTO user (ho, ten, email, mat_khau, dien_thoai, dia_chi, thanhpho, vai_tro, ngay_capnhat)
                    VALUES (:ho, :ten, :email, :mat_khau, :dien_thoai, :dia_chi, :thanhpho, :vai_tro, :ngay_capnhat)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':thanhpho', $thanhpho);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi đăng ký: " . $e->getMessage());
            return false;
        }
    }

    public function checkEmailExists($email)
    {
        $sql = 'SELECT * FROM user WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->rowCount() > 0;
    }

    public function checkPhoneExists($dien_thoai)
    {
        $sql = 'SELECT * FROM user WHERE dien_thoai = :dien_thoai';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['dien_thoai' => $dien_thoai]);
        return $stmt->rowCount() > 0;
    }

    public function checkLoginClient($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log('Lỗi đăng nhập: ' . $e->getMessage());
            return false;
        }
    }

    public function showClient($id)
    {
        try {
            $sql = 'SELECT * FROM user WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Loi' . $e->getMessage();
        }
    }

    public function updateUser($id, $ten, $email, $dien_thoai, $dia_chi, $mat_khau)
    {
        try {
            $sql = 'UPDATE user SET ten = :ten, email = :email, dien_thoai = :dien_thoai, dia_chi = :dia_chi, mat_khau = :mat_khau WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
                ':email' => $email,
                ':dien_thoai' => $dien_thoai,
                ':dia_chi' => $dia_chi,
                ':mat_khau' => $mat_khau
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Loi' . $e->getMessage();
        }
    }
}