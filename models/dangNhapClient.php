<?php

class DangNhapClient
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkdangki($ho, $ten, $email, $mat_khau, $dien_thoai, $dia_chi, $thanhpho, $vai_tro, $ngay_capnhat)
    {
        try {
            $sql = 'INSERT INTO user (ho,ten,email,mat_khau,dien_thoai,dia_chi,thanhpho,vai_tro,ngay_capnhat)
            VALUES (:ho,:ten,:email,:mat_khau,:dien_thoai,:dia_chi,:thanhpho,:vai_tro,:ngay_capnhat)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho' => $ho,
                ':ten' => $ten,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':dien_thoai' => $dien_thoai,
                ':dia_chi' => $dia_chi,
                ':thanhpho' => $thanhpho,
                ':vai_tro' => $vai_tro,
                ':ngay_capnhat' => $ngay_capnhat,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Loi' . $e->getMessage();
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
            $user = $stmt->fetch();
            if($mat_khau == $user['mat_khau']) {
                if($user['vai_tro'] == "khach hang") {
                    return $user;
                } else {
                    return 'Dang nhap sai thong tin';
                }
            } else {
                return 'Dang nhap sai thong tin';
            }
        } catch (Exception $e) {
            echo 'Loi' . $e->getMessage();
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