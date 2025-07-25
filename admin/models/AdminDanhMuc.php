<?php 

class AdminDanhMuc {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT * FROM category';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailDanhMuc($id)
    {
        try {
            $sql = 'SELECT * FROM category WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertDanhMuc($ten, $mieuta, $ngay_capnhat) {
        try {
            $sql = 'INSERT INTO category (ten, mieuta, ngay_capnhat) VALUES (:ten, :mieuta, :ngay_capnhat)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':mieuta', $mieuta);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateDanhMuc($id, $ten, $mieuta, $ngay_capnhat)
    {
        try {
            $sql = 'UPDATE category SET ten = :ten, mieuta = :mieuta, ngay_capnhat = :ngay_capnhat WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':mieuta', $mieuta);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function destroyDanhMuc($id)
    {
        try {
            $sql = 'DELETE FROM category WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}