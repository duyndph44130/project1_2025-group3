<?php
class LienHeController {
    public $model;

    public function __construct() {
        $this->model = new LienHe();
    }

    public function formLienHe() {
        require_once './views/layout/formLienHe.php';
    }

    public function guiLienHe() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = trim($_POST['ten']);
            $email = trim($_POST['email']);
            $tieu_de = trim($_POST['tieu_de']);
            $noi_dung = trim($_POST['noi_dung']);

            if (!$ten || !$email || !$tieu_de || !$noi_dung) {
                $_SESSION['error_message'] = 'Vui lòng điền đầy đủ thông tin';
                header('Location: ' . BASE_URL . '?act=form-lien-he');
                exit();
            }

            $this->model->luuLienHe($ten, $email, $tieu_de, $noi_dung);
            $_SESSION['success_message'] = 'Gửi liên hệ thành công!';
            header('Location: ' . BASE_URL . '?act=form-lien-he');
            exit();
        }
    }
}
