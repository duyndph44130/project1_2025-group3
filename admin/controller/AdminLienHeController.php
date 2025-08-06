<?php
class AdminLienHeController {
    public $modelLienHe;

    public function __construct() {
        $this->modelLienHe = new AdminLienHe();
    }

    // Hiển thị danh sách liên hệ
    public function danhSachLienHe() {
        $contacts = $this->modelLienHe->getAllContacts();
        require_once './views/lienhe/danhsachlienhe.php';
    }





    // Xem chi tiết liên hệ
    public function chiTietLienHe() {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $contact = $this->modelLienHe->getContactById($id);
            if ($contact) {
                require_once './views/lienhe/chitietlienhe.php';
                return;
            }
        }

        // Nếu không có liên hệ hợp lệ
        $_SESSION['error_message'] = 'Liên hệ không tồn tại';
        header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }

    // Xóa liên hệ
    public function xoaLienHe() {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $contact = $this->modelLienHe->getContactById($id);
            if ($contact) {
                $this->modelLienHe->deleteContact($id);
                $_SESSION['success_message'] = 'Xóa liên hệ thành công!';
            } else {
                $_SESSION['error_message'] = 'Liên hệ không tồn tại';
            }
        } else {
            $_SESSION['error_message'] = 'ID không hợp lệ';
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
}
