<?php 
class SanPham {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllSanPham() {
        try {
            $sql = 'SELECT product.*, category.ten AS ten_danhmuc
            FROM product
            INNER JOIN category ON product.id_danhmuc = category.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function chitiet($id) {
        try {
            $sql = 'SELECT product.*, category.ten AS ten_danhmuc
                    FROM product
                    INNER JOIN category ON product.id_danhmuc = category.id
                    WHERE product.id_danhmuc = :id_danhmuc';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_danhmuc', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function selectChiTietSp($id)
    {
        try {
            $sql = 'SELECT * FROM product WHERE  id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getNguoiDungFromEmail($user)
    {
        try {
            $sql = 'SELECT * FROM user WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $user);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

        public function getGioHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE id_nguoi_dung = :id_nguoi_dung';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_nguoi_dung', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    
    public function addGioHang($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (id_nguoi_dung) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

        public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, product.ten, product.hinhanh ,product.gia_coso
        FROM chi_tiet_gio_hangs 
        INNER JOIN product ON chi_tiet_gio_hangs.id_san_pham = product.id
        WHERE chi_tiet_gio_hangs.id_gio_hang = :id_gio_hang';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_gio_hang', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    public function updateSoLuong($id_gio_hang, $id_san_pham, $updateSoLuong)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong
            WHERE id_gio_hang = :id_gio_hang AND id_san_pham = :id_san_pham
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_gio_hang', $id_gio_hang);
            $stmt->bindParam(':id_san_pham', $id_san_pham);
            $stmt->bindParam(':so_luong', $updateSoLuong);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function addDetailGioHang($id_gio_hang, $id_san_pham, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (id_gio_hang, id_san_pham, so_luong)
                VALUES (:id_gio_hang, :id_san_pham, :so_luong)
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_gio_hang', $id_gio_hang);
            $stmt->bindParam(':id_san_pham', $id_san_pham);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

        public function getSanPhamById($id_san_pham)
    {
        try {
            $sql = 'SELECT * FROM product
            WHERE id = :id  ';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_san_pham);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    
        public function xoa($id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id = :id   
                ';

            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho tham số san_pham_id
            $stmt->bindParam(':id', $id);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Trả về danh sách sản phẩm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

        public function addThanhToan($id_KH, $ten, $email, $dien_thoai, $dia_chi, $vanchuyen_thanhpho, $tong_gia, $phuongthuc_thanhtoan, $trangthai_thanhtoan, $trangthai, $ngay_capnhat, $phien_token)
    {
        try {
            $sql = 'INSERT INTO orders (id_KH,ten,email,dien_thoai,dia_chi,vanchuyen_thanhpho,tong_gia,phuongthuc_thanhtoan,trangthai_thanhtoan,trangthai,ngay_capnhat,phien_token)
        VALUE  (:id_KH,:ten,:email,:dien_thoai,:dia_chi,:vanchuyen_thanhpho,:tong_gia,:phuongthuc_thanhtoan,:trangthai_thanhtoan,:trangthai,:ngay_capnhat,:phien_token)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_KH', $id_KH);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dien_thoai', $dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':vanchuyen_thanhpho', $vanchuyen_thanhpho);
            $stmt->bindParam(':tong_gia', $tong_gia);
            $stmt->bindParam(':phuongthuc_thanhtoan', $phuongthuc_thanhtoan);
            $stmt->bindParam(':trangthai_thanhtoan', $trangthai_thanhtoan);
            $stmt->bindParam(':trangthai', $trangthai);
            $stmt->bindParam(':ngay_capnhat', $ngay_capnhat);
            $stmt->bindParam(':phien_token', $phien_token);

            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

        public function addChitietDonHang($donHangId, $sanPhamId, $donGia, $soLuong, $thanhTien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hang (id_donhang,id_san_pham, gia,so_luong,tong_gia)
                    VALUES (:id_donhang,:id_san_pham, :gia,:so_luong,:tong_gia)';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_donhang', $donHangId);
            $stmt->bindParam(':id_san_pham', $sanPhamId);
            $stmt->bindParam(':gia', $donGia);
            $stmt->bindParam(':so_luong', $soLuong);
            $stmt->bindParam(':tong_gia', $thanhTien);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Xóa chi tiết giỏ hàng thông qua id_gio_hang
    public function clearDetailGioHang($gioHangId)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id_gio_hang = :id_gio_hang';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_gio_hang', $gioHangId);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // xóa giỏ hàng từ id người dùng khi thanh toán
    public function clearGioHang($nguoiDungId)
    {
        try {
            $sql = 'DELETE FROM gio_hangs WHERE id_nguoi_dung = :id_nguoi_dung';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_nguoi_dung', $nguoiDungId);;
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function thanhCong($id, $soLuong)
    {
        try {
            $sql = 'UPDATE product SET cosan_stock = cosan_stock - :cosan_stock WHERE id = :id AND cosan_stock >= :cosan_stock';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':cosan_stock', $soLuong);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT trangthai FROM orders';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getPhuongThucThanhToan()
    {
        try {
            $sql = 'SELECT phuongthuc_thanhtoan FROM orders';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getDonHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM orders 
        WHERE id_KH = :id_KH';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_KH', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getDonHangById($donHangId)
    {
        try {
            $sql = 'SELECT * FROM orders WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $donHangId]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function updateTrangThaiDonHang($donHangId, $trangThai)
    {
        try {
            $sql = "UPDATE orders 
                SET trangthai = :trangthai 
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trangthai' => $trangThai,
                ':id' => $donHangId
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }

    //lấy chi tiết hơn
    public function getChiTietDonHangById($donHangId)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hang.*, product.ten, product.hinhanh
                    FROM chi_tiet_don_hang
                    JOIN product ON chi_tiet_don_hang.id_san_pham = product.id
                    WHERE chi_tiet_don_hang.id_donhang = :id_donhang
                    ORDER BY chi_tiet_don_hang.id ASC';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_donhang' => $donHangId]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //Lấy bình thường để in ra kết quả đã hủy đơn
    public function getChiTietDonHang($donHangId)
    {
        try {
            $sql = "SELECT id_san_pham , so_luong FROM chi_tiet_don_hangs WHERE id_don_hang = :id_don_hang";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_don_hang', $donHangId);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getAllSp($search)
    {
        try {
            $sql = 'SELECT product.*, category.ten AS ten_danhmuc 
        FROM product 
        INNER JOIN category ON product.id_danhmuc = category.id
        WHERE product.ten LIKE :search OR category.ten LIKE :search';

            $stmt = $this->conn->prepare($sql);

            // Thêm dấu % để tìm kiếm bất kỳ vị trí nào trong chuỗi
            $search = "%$search%";
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}