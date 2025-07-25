<?php 
// require file common 
require_once '../commons/env.php'; // khai bao bien moi truong 
require_once '../commons/function.php'; // ham ho tro

// require toan bo file controllers
require_once './controller/AdminSanPhamController.php';
require_once './controller/AdminDanhMucController.php';
require_once './controller/AdminBinhLuanController.php';
require_once './controller/AdminDonHangController.php';
require_once './controller/AdminTaiKhoanController.php';

// require toan bo file model
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminBinhLuan.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// route
$act = $_GET['act'] ?? '/';

match ($act) {
    // Trang chủ
    '/' => (new AdminDanhMucController())->danhSachDanhMuc(),

    // ==================== Danh mục ====================
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // ==================== Sản phẩm ====================
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),

    // ==================== Bình luận ====================
    'binh-luan' => (new AdminBinhLuanController())->danhSachBinhLuan(),
    'xoa-binh-luan' => (new AdminBinhLuanController())->deleteBinhLuan(),

    // ==================== Đơn hàng ====================
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'chi-tiet-va-sua-don-hang' => (new AdminDonHangController())->detailAndEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),

    // ==================== Quản trị viên ====================
    'quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postQuanTri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),
    'reset-password' => (new AdminTaiKhoanController())->resetPassword(),

    // ==================== Mặc định ====================
    default => http_response_code(404) && exit("404 - Không tìm thấy trang."),
};
