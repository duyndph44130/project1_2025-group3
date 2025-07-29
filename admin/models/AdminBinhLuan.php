<?php
class AdminBinhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả bình luận
    public function getAllBinhLuan()
    {
        try {
            $sql = "SELECT * FROM comment ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    // Lấy chi tiết bình luận
    public function getDetailBinhLuan($id) {
        try {
            $sql = "SELECT * FROM comment WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    // Chỉnh sửa trạng thái bình luận
    public function updateTrangThaiBinhLuan($id, $trang_thai) {
        try {
            $sql = "UPDATE comment SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi updateTrangThaiBinhLuan: " . $e->getMessage());
            return false;
        }
    }

    // Xóa bình luận
    public function deleteBinhLuan($id)
    {
        try {
            $sql = "DELETE FROM comment WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
