<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan('admin');
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
    }

    public function postQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'] ?? '';
            $ho = $_POST['ho'] ?? '';
            $email = $_POST['email'] ?? '';
            $dien_thoai = $_POST['dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $thanhpho = $_POST['thanhpho'] ?? '';
            $vai_tro = $_POST['vai_tro'] ?? '';
            $ngay_capnhat = $_POST['ngay_capnhat'] ?? '';

            $error = [];

            if (empty($ten)) $error['ten'] = 'Tên không được để trống';
            if (empty($ho)) $error['ho'] = 'Họ không được để trống';
            if (empty($email)) {
                $error['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email không hợp lệ';
            }
            if (empty($dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không được để trống';
            } elseif (!preg_match('/^[0-9]{10,11}$/', $dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không hợp lệ';
            }
            if (empty($dia_chi)) $error['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($thanhpho)) $error['thanhpho'] = 'Thành phố không được để trống';
            if (empty($vai_tro)) {
                $error['vai_tro'] = 'Vai trò không được để trống';
            } elseif (!in_array($vai_tro, ['1', '2'])) {
                $error['vai_tro'] = 'Vai trò không hợp lệ';
            }
            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống';
            } elseif (!DateTime::createFromFormat('Y-m-d\TH:i', $ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ';
            }

            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }

            $mat_khau = password_hash('123@123ac', PASSWORD_BCRYPT);
            $this->modelTaiKhoan->insertTaiKhoan($ten, $ho, $dien_thoai, $dia_chi, $thanhpho, $ngay_capnhat, $email, $mat_khau, $vai_tro);
            
            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }
    }

    public function formEditQuanTri()
    {
        $id_quantri = $_GET['id_quantri'] ?? 0;
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quantri);
        if ($quanTri) {
            require_once './views/taikhoan/quantri/editQuanTri.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }
    }

    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? 0;
            $ten = $_POST['ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $dien_thoai = $_POST['dien_thoai'] ?? '';
            $ho = $_POST['ho'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $thanhpho = $_POST['thanhpho'] ?? '';
            $vai_tro = $_POST['vai_tro'] ?? '';
            $ngay_capnhat = $_POST['ngay_capnhat'] ?? '';

            $error = [];

            if (empty($ten)) $error['ten'] = 'Tên không được để trống';
            if (empty($ho)) $error['ho'] = 'Họ không được để trống';
            if (empty($email)) {
                $error['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email không hợp lệ';
            }
            if (empty($dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không được để trống';
            } elseif (!preg_match('/^[0-9]{10,11}$/', $dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không hợp lệ';
            }
            if (empty($dia_chi)) $error['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($thanhpho)) $error['thanhpho'] = 'Thành phố không được để trống';
            if (empty($vai_tro)) {
                $error['vai_tro'] = 'Vai trò không được để trống';
            } elseif (!in_array($vai_tro, ['1', '2'])) {
                $error['vai_tro'] = 'Vai trò không hợp lệ';
            }
            if (empty($ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không được để trống';
            } elseif (!DateTime::createFromFormat('Y-m-d\TH:i', $ngay_capnhat)) {
                $error['ngay_capnhat'] = 'Ngày cập nhật không hợp lệ';
            }

            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quantri=' . $id);
                exit();
            }

            $this->modelTaiKhoan->updateTaiKhoan($id, $ten, $email, $dien_thoai, $ho, $dia_chi, $thanhpho, $vai_tro, $ngay_capnhat);
            
            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }
    }

    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quantri'] ?? 0;
        $mat_khau = password_hash('123@123ac', PASSWORD_BCRYPT);

        $this->modelTaiKhoan->resetPassword($tai_khoan_id, $mat_khau);
        header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        exit();
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan('khách hàng');
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khachhang'] ?? 0;
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachhang/editKhachHang.php';
    }

    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? 0;
            $ten = $_POST['ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $dien_thoai = $_POST['dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $thanhpho = $_POST['thanhpho'] ?? '';

            $error = [];

            if (empty($ten)) $error['ten'] = 'Tên không được để trống';
            if (empty($email)) {
                $error['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email không hợp lệ';
            }
            if (empty($dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không được để trống';
            } elseif (!preg_match('/^[0-9]{10,11}$/', $dien_thoai)) {
                $error['dien_thoai'] = 'Số điện thoại không hợp lệ';
            }
            if (empty($dia_chi)) $error['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($thanhpho)) $error['thanhpho'] = 'Thành phố không được để trống';

            if (!empty($error)) {
                $_SESSION['errors'] = $error;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khachhang=' . $id);
                exit();
            }

            $this->modelTaiKhoan->updateKhachHang($id, $ten, $email, $dien_thoai, $dia_chi, $thanhpho);
            
            unset($_SESSION['errors'], $_SESSION['old']);
            header("Location: " . BASE_URL_ADMIN . '?act=khach-hang');
            exit();
        }
    }

    public function detailKhachHang()
    {
        $id = $_GET['id_khachhang'] ?? 0;
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $user = $this->modelTaiKhoan->checkLogin($email, $mat_khau);

            if (is_array($user) && $user['vai_tro'] == 'admin') {
                $_SESSION['user_admin'] = $user['email'];
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user_admin']);
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }

    public function deleteKhachHang() {
        $id = $_GET['id_khachhang'] ?? 0;
        if ($id > 0) {
            $result = $this->modelTaiKhoan->deleteTaiKhoan($id);
            if ($result) {
                $_SESSION['success'] = 'Xóa tài khoản thành công';
            } else {
                $_SESSION['error'] = 'Xóa tài khoản thất bại';
            }
        } else {
            $_SESSION['error'] = 'ID khách hàng không hợp lệ';
        }
        header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        exit();
    }
}
?>