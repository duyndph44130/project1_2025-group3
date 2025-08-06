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
        $modelLienHe = new AdminLienHe();

        $listDanhMuc = $modelDanhMuc->getAllDanhMuc();
        $listSanPham = $modelSanPham->getLatest();
        $listKhachHang = $modelKhachHang->getAllTaiKhoan('admin');
        $listOrders = $modelDonHang->getLatest();
        $listBinhLuan = $modelBinhLuan->getLatest(); 
        $listLienHe = $modelLienHe->getLatest();       
        require_once './views/home.php';
    }
}
