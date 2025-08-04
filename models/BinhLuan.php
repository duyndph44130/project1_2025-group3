<?php 
class BinhLuan {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function layBinhLuanTheoSanPham($id) {
        try {
            $sql = 'SELECT comment.*, user.ten AS ten_nguoi_dung 
                    FROM comment 
                    JOIN user ON comment.id_nguoi_dung = user.id
                    WHERE comment.id_san_pham = :id_san_pham 
                    AND comment.trang_thai = 1
                    ORDER BY comment.ngay_dang DESC';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
            $stmt->execute();

            $allComment = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $allComment ?: [];  // Trả về mảng rỗng nếu không có dữ liệu
        } catch (Exception $e) {
            echo "Lỗi khi lấy bình luận: " . $e->getMessage();
            return [];
        }
    }

    public function themBinhLuan($id_san_pham, $id_nguoi_dung, $noi_dung, $ngay_dang, $trang_thai) {
        try {
            $sql = 'INSERT INTO comment (id_san_pham,id_nguoi_dung,noi_dung,ngay_dang,trang_thai) 
                        VALUES (:id_san_pham,:id_nguoi_dung,:noi_dung,:ngay_dang,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham,
                ':id_nguoi_dung' => $id_nguoi_dung,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
                ':trang_thai' => $trang_thai
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi khi lấy bình luận"  . $e->getMessage();
        }
    }
}