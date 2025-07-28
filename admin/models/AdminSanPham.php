<?php
class AdminSanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT product.*, category.ten AS ten_danhmuc 
                    FROM product 
                    INNER JOIN category ON product.id_danhmuc = category.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function insertSanPham($ten, $mota, $id_danhmuc, $gia_coso, $cosan_stock, $ma_hang, $trang_thai, $ngay_capnhat, $hinhanh)
    {
        try {
            $sql = 'INSERT INTO product (ten, mota, id_danhmuc, gia_coso, cosan_stock, ma_hang, trang_thai, ngay_capnhat, hinhanh)
                    VALUES (:ten, :mota, :id_danhmuc, :gia_coso, :cosan_stock, :ma_hang, :trang_thai, :ngay_capnhat, :hinhanh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
                ':mota' => $mota,
                ':id_danhmuc' => $id_danhmuc,
                ':gia_coso' => $gia_coso,
                ':cosan_stock' => $cosan_stock,
                ':ma_hang' => $ma_hang,
                ':trang_thai' => $trang_thai,
                ':ngay_capnhat' => $ngay_capnhat,
                ':hinhanh' => $hinhanh
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM product WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateSanPham($id, $ten, $mota, $id_danhmuc, $gia_coso, $cosan_stock, $ma_hang, $trang_thai, $hinhanh, $ngay_capnhat)
    {
        try {
            // Nếu không có ảnh mới, không cập nhật trường hinhanh
            if (empty($hinhanh)) {
                $sql = "UPDATE product
                        SET ten = :ten, mota = :mota, id_danhmuc = :id_danhmuc,
                            gia_coso = :gia_coso, cosan_stock = :cosan_stock,
                            ma_hang = :ma_hang, trang_thai = :trang_thai,
                            ngay_capnhat = :ngay_capnhat
                        WHERE id = :id";
                $params = [
                    ':id' => $id,
                    ':ten' => $ten,
                    ':mota' => $mota,
                    ':id_danhmuc' => $id_danhmuc,
                    ':gia_coso' => $gia_coso,
                    ':cosan_stock' => $cosan_stock,
                    ':ma_hang' => $ma_hang,
                    ':trang_thai' => $trang_thai,
                    ':ngay_capnhat' => $ngay_capnhat
                ];
            } else {
                $sql = "UPDATE product
                        SET ten = :ten, mota = :mota, id_danhmuc = :id_danhmuc,
                            gia_coso = :gia_coso, cosan_stock = :cosan_stock,
                            ma_hang = :ma_hang, trang_thai = :trang_thai,
                            hinhanh = :hinhanh, ngay_capnhat = :ngay_capnhat
                        WHERE id = :id";
                $params = [
                    ':id' => $id,
                    ':ten' => $ten,
                    ':mota' => $mota,
                    ':id_danhmuc' => $id_danhmuc,
                    ':gia_coso' => $gia_coso,
                    ':cosan_stock' => $cosan_stock,
                    ':ma_hang' => $ma_hang,
                    ':trang_thai' => $trang_thai,
                    ':hinhanh' => $hinhanh,
                    ':ngay_capnhat' => $ngay_capnhat
                ];
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function destroySanPham($id)
    {
        try {
            $sql = 'DELETE FROM product WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function getBinhLuanFromKhachHang($id_sanpham)
    {
        try {
            $sql = "SELECT comment.*, user.ten AS ten_khach 
                    FROM comment 
                    INNER JOIN user ON comment.id_user = user.id 
                    WHERE comment.id_product = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id_sanpham]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
