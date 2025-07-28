<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_URL_ADMIN')) {
    define('BASE_URL_ADMIN', 'http://your-domain.com/admin/');
}

class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $error = isset($_SESSION['errors']) && is_array($_SESSION['errors']) ? $_SESSION['errors'] : [];
        $old = !empty($error) ? (isset($_SESSION['old']) && is_array($_SESSION['old']) ? $_SESSION['old'] : []) : [];
        require_once './views/sanpham/addSanPham.php';
    }

    public function postSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = trim($_POST['ten'] ?? '');
            $gia_coso = $_POST['gia_coso'] ?? '';
            $cosan_stock = $_POST['cosan_stock'] ?? '';
            $ngay_capnhat = $_POST['ngay_capnhat'] ?? '';
            $id_danhmuc = $_POST['id_danhmuc'] ?? '';
            $ma_hang = trim($_POST['ma_hang'] ?? '');
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mota = trim($_POST['mota'] ?? '');

            $error = [];

            // Validate dữ liệu
            if (empty($ten)) {
                $error['ten'] = 'Tên sản phẩm không được để trống.';
            } elseif (strlen($ten) < 3 || strlen($ten) > 100) {
                $error['ten'] = 'Tên sản phẩm phải từ 3 đến 100 ký tự.';
            }

            if (empty($gia_coso) || !is_numeric($gia_coso) || $gia_coso <= 0) {
                $error['gia_coso'] = 'Giá sản phẩm phải là số lớn hơn 0.';
            }

            if (empty($cosan_stock) || !is_numeric($cosan_stock) || $cosan_stock < 0) {
                $error['cosan_stock'] = 'Số lượng phải là số không âm.';
            }

            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống.';
            } else {
                $ngay_capnhat = str_replace('T', ' ', $ngay_capnhat);
                if (!DateTime::createFromFormat('Y-m-d H:i:s', $ngay_capnhat)) {
                    $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ.';
                }
            }

            if (empty($id_danhmuc) || !is_numeric($id_danhmuc)) {
                $error['id_danhmuc'] = 'Vui lòng chọn danh mục hợp lệ.';
            }

            if (empty($trang_thai) || !in_array($trang_thai, ['active', 'inactive'])) {
                $error['trang_thai'] = 'Vui lòng chọn trạng thái hợp lệ.';
            }

            // Validate hình ảnh
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
                $hinhanh = $_FILES['hinhanh'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $fileType = mime_content_type($hinhanh['tmp_name']);

                if (!in_array($fileType, $allowedTypes)) {
                    $error['hinhanh'] = 'Chỉ chấp nhận ảnh JPG, PNG, GIF, hoặc WEBP.';
                } else {
                    $file_thumb = upLoadFile($hinhanh, './uploads/');
                }
            } else {
                $error['hinhanh'] = 'Vui lòng chọn hình ảnh sản phẩm.';
            }

            // Nếu có lỗi thì lưu vào session và chuyển hướng
            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }

            // Thêm sản phẩm
            $this->modelSanPham->insertSanPham(
                $ten,
                $mota,
                $id_danhmuc,
                $gia_coso,
                $cosan_stock,
                $ma_hang,
                $trang_thai,
                $ngay_capnhat,
                $file_thumb
            );

            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function formEditSanPham()
    {
        $id = $_GET['id_sanpham'] ?? null;
        if (!$id || !is_numeric($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }

        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanpham) {
            $error = isset($_SESSION['errors']) && is_array($_SESSION['errors']) ? $_SESSION['errors'] : [];
            $old = !empty($error) ? (isset($_SESSION['old']) && is_array($_SESSION['old']) ? $_SESSION['old'] : []) : [];
            require_once './views/sanpham/editSanPham.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function postEditSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $ten = trim($_POST['ten'] ?? '');
            $gia_coso = $_POST['gia_coso'] ?? '';
            $cosan_stock = $_POST['cosan_stock'] ?? '';
            $ngay_capnhat = $_POST['ngay_capnhat'] ?? '';
            $id_danhmuc = $_POST['id_danhmuc'] ?? '';
            $ma_hang = trim($_POST['ma_hang'] ?? '');
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mota = trim($_POST['mota'] ?? '');

            if (!$id || !is_numeric($id)) {
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            }

            $error = [];

            // Validate dữ liệu
            if (empty($ten)) {
                $error['ten'] = 'Tên sản phẩm không được để trống.';
            } elseif (strlen($ten) < 3 || strlen($ten) > 100) {
                $error['ten'] = 'Tên sản phẩm phải từ 3 đến 100 ký tự.';
            }

            if (empty($gia_coso) || !is_numeric($gia_coso) || $gia_coso <= 0) {
                $error['gia_coso'] = 'Giá sản phẩm phải là số lớn hơn 0.';
            }

            if (empty($cosan_stock) || !is_numeric($cosan_stock) || $cosan_stock < 0) {
                $error['cosan_stock'] = 'Số lượng phải là số không âm.';
            }

            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống.';
            } else {
                $ngay_capnhat = str_replace('T', ' ', $ngay_capnhat);
                if (!DateTime::createFromFormat('Y-m-d H:i:s', $ngay_capnhat)) {
                    $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ.';
                }
            }

            if (empty($id_danhmuc) || !is_numeric($id_danhmuc)) {
                $error['id_danhmuc'] = 'Vui lòng chọn danh mục hợp lệ.';
            }

            if (empty($trang_thai) || !in_array($trang_thai, ['active', 'inactive'])) {
                $error['trang_thai'] = 'Vui lòng chọn trạng thái hợp lệ.';
            }

            // Validate hình ảnh
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
                $hinhanh = $_FILES['hinhanh'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $fileType = mime_content_type($hinhanh['tmp_name']);

                if (!in_array($fileType, $allowedTypes)) {
                    $error['hinhanh'] = 'Chỉ chấp nhận ảnh JPG, PNG, GIF, hoặc WEBP.';
                } else {
                    $file_thumb = upLoadFile($hinhanh, './uploads/');
                }
            } else {
                // Use existing image if no new upload
                $sp = $this->modelSanPham->getDetailSanPham($id);
                $file_thumb = $sp['hinhanh'] ?? '';
            }

            // Nếu có lỗi thì lưu vào session và chuyển hướng
            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_sanpham=' . $id);
                exit();
            }

            // Cập nhật sản phẩm
            $this->modelSanPham->updateSanPham(
                $id,
                $ten,
                $mota,
                $id_danhmuc,
                $gia_coso,
                $cosan_stock,
                $ma_hang,
                $trang_thai,
                $file_thumb,
                $ngay_capnhat
            );

            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function deleteSanPham()
    {
        $id = $_GET['id_sanpham'] ?? null;
        if ($id && is_numeric($id)) {
            $sanpham = $this->modelSanPham->getDetailSanPham($id);
            if ($sanpham) {
                $this->modelSanPham->destroySanPham($id);
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
}
?>