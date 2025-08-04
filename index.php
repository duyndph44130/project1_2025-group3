<?php session_start(); ?>
<?php

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/dangNhapClientController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/BinhLuan.php';
require_once './models/dangNhapClient.php';


// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);die();
match ($act) {
    '/' => (new HomeController())->home(),
    'home' => (new HomeController())->home(),

    // Đăng nhập / đăng ký
    'form-dang-ki-client' => (new DangNhapClientController())->formdangki(),
    'check-dang-ki-client' => (new DangNhapClientController())->dangki(),
    'form-dang-nhap-client' => (new DangNhapClientController())->formdangnhap(),
    'check-dang-nhap-client' => (new DangNhapClientController())->dangnhap(),
    'log-out-client' => (new DangNhapClientController())->logoutclient(),

    //Chi tiết tài khoản
    'chi-tiet-tai-khoan-client' => (new dangNhapClientController())->chiTietTaiKhoanClient(),
    'form-sua-thong-tin-client' => (new dangNhapClientController())->formSuaThongTinClient(),
    'sua-thong-tin-client' => (new dangNhapClientController())->suaThongTinClient(),

    //Chi tiết sản phẩm
    'san-pham' => (new SanPhamController())->show(),
    'chi-tiet-sp' => (new SanPhamController())->chitietSP(),
    'them-binh-luan' => (new SanPhamController())->themBinhLuan(),
    //Giỏ hàng
    'them-gio-hang' => (new SanPhamController())->addGioHang(),
    'gio-hang' => (new SanPhamController())->gioHang(),
    'xoa-gio-hang' => (new SanPhamController())->xoaGioHang(),

    //Thanh toán 
    'thanh-toan' => (new SanPhamController())->thanhToan(),
    'xu-li-thanh-toan' => (new SanPhamController())->xuLiThanhToan(),

    //Lich su mua hang
    'lich-su-mua-hang' => (new SanPhamController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new SanPhamController())->chiTietMuaHang(),
    'huy-don-hang' => (new SanPhamController())->huyDonHang(),

    'search' => (new SanPhamController())->search(),

    default => die('404 - Không tìm thấy trang'),


};
