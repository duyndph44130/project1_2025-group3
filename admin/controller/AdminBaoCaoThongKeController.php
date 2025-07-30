<?php
class AdminBaoCaoThongKeController
{
    public function home()
    {
    $modelDanhMuc = new AdminDanhMuc();
        $modelSanPham = new AdminSanPham();
        $modelKhachHang = new AdminTaiKhoan();
        $modelDonHang = new AdminDonHang();
        $modelBinhLuan = new AdminBinhLuan();

        $listDanhMuc = $modelDanhMuc->getAllDanhMuc();
        $listSanPham = $modelSanPham->getLatest();
        $listKhachHang = $modelKhachHang->getAllTaiKhoan('user');
        $listOrders = $modelDonHang->getLatest();
        $listBinhLuan = $modelBinhLuan->getLatest();        
        require_once './views/home.php';
    }
}
