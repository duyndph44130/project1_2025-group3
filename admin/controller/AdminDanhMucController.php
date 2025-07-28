<?php
class AdminDanhMucController {
    public $modelDanhMuc;

    public function __construct() {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc() {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function chiTietDanhMuc() {
        $id = $_GET['id_danhmuc'] ?? null;
        if (!$id || !is_numeric($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
        $detailDanhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($detailDanhMuc) {
            require_once './views/danhmuc/detailDanhMuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function formAddDanhMuc() {
        $error = $_SESSION['errors'] ?? [];
        $old = $_SESSION['old'] ?? [];
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postDanhMuc() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = trim($_POST['ten'] ?? '');
            $mieuta = trim($_POST['mieuta'] ?? '');
            $ngay_capnhat_input = $_POST['ngay_capnhat'] ?? '';
            $ngay_capnhat = $ngay_capnhat_input ? date('Y-m-d H:i:s', strtotime($ngay_capnhat_input)) : date('Y-m-d H:i:s');


            $error = [];

            // Validate 'ten'
            if (empty($ten)) {
                $error['ten'] = 'Tên danh mục không được để trống.';
            } elseif (strlen($ten) < 3 || strlen($ten) > 50) {
                $error['ten'] = 'Tên danh mục phải từ 3 đến 50 ký tự.';
            } elseif (!preg_match('/^[a-zA-Z0-9\sÀ-ỹ]+$/u', $ten)) {
                $error['ten'] = 'Tên danh mục không chứa ký tự đặc biệt.';
            }

            // Validate 'mieuta'
            if (!empty($mieuta) && strlen($mieuta) > 255) {
                $error['mieuta'] = 'Mô tả không được vượt quá 255 ký tự.';
            }

            // Validate 'ngay_capnhat'
            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống.';
            } elseif (!$this->isValidDateTime($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ.';
            }

            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                exit();
            }

            $this->modelDanhMuc->insertDanhMuc($ten, $mieuta, $ngay_capnhat);
            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function formEditDanhMuc() {
        $id = $_GET['id_danhmuc'] ?? null;
        if (!$id || !is_numeric($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }

        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhmuc) {
            $error = $_SESSION['errors'] ?? [];
            $old = $_SESSION['old'] ?? [];
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $ten = trim($_POST['ten'] ?? '');
            $mieuta = trim($_POST['mieuta'] ?? '');
            $ngay_capnhat_input = $_POST['ngay_capnhat'] ?? '';
            $ngay_capnhat = $ngay_capnhat_input ? date('Y-m-d H:i:s', strtotime($ngay_capnhat_input)) : date('Y-m-d H:i:s');


            $error = [];

            // Validate 'id'
            if (!$id || !is_numeric($id)) {
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }

            // Validate 'ten'
            if (empty($ten)) {
                $error['ten'] = 'Tên danh mục không được để trống.';
            } elseif (strlen($ten) < 3 || strlen($ten) > 50) {
                $error['ten'] = 'Tên danh mục phải từ 3 đến 50 ký tự.';
            } elseif (!preg_match('/^[a-zA-Z0-9\sÀ-ỹ]+$/u', $ten)) {
                $error['ten'] = 'Tên danh mục không chứa ký tự đặc biệt.';
            }

            // Validate 'mieuta'
            if (!empty($mieuta) && strlen($mieuta) > 255) {
                $error['mieuta'] = 'Mô tả không được vượt quá 255 ký tự.';
            }

            // Validate 'ngay_capnhat'
            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống.';
            } elseif (!$this->isValidDateTime($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ.';
            }

            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danhmuc=' . $id);
                exit();
            }

            $this->modelDanhMuc->updateDanhMuc($id, $ten, $mieuta, $ngay_capnhat);
            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function deleteDanhMuc() {
        $id = $_GET['id_danhmuc'] ?? null;
        if ($id && is_numeric($id)) {
            $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
            if ($danhmuc) {
                $this->modelDanhMuc->destroyDanhMuc($id);
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }

    private static function isValidDateTime($datetime, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $datetime);
        return $d && $d->format($format) === $datetime;
    }
}
?>