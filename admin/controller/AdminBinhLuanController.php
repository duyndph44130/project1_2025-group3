<?php

class AdminBinhLuanController {
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    // Hiển thị danh sách bình luận
    public function danhSachBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/binhluan/listBinhLuan.php';
    }

      // Hiển thị form chỉnh sửa trạng thái bình luận
    public function formEditTrangThaiBinhLuan()
    {
        $id = $_GET['id_binhluan'] ?? 0;
        $binhluan = $this->modelBinhLuan->getDetailBinhLuan($id);
        require_once './views/binhluan/editTrangThai.php';
    }

    // Xử lý cập nhật trạng thái bình luận
    public function updateTrangThai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_binhluan'] ?? 0;
            $trang_thai = $_POST['trang_thai'] ?? 1;
            $result = $this->modelBinhLuan->updateTrangThaiBinhLuan($id, $trang_thai);
            if ($result) {
                $_SESSION['success'] = 'Cập nhật trạng thái thành công';
            } else {
                $_SESSION['error'] = 'Cập nhật trạng thái thất bại';
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=binh-luan');
        exit();
    }

    // Xoá bình luận
    public function deleteBinhLuan()
    {
        $id = $_GET['id_binhluan'];
        $this->modelBinhLuan->deleteBinhLuan($id);
        header("Location: " . BASE_URL_ADMIN . '?act=binh-luan');
        exit();
    }
}