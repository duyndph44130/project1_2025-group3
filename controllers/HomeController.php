<?php

// Include các model cần thiết
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $sanPhamMoi = $this->modelSanPham->getSanPhamMoiNhat(8); // VD: lấy 8 sp mới nhất

        // Gửi dữ liệu sang view
        require_once './views/home.php';
    }
}