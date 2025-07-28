<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Sửa tài khoản quản trị</h1>
    </section>

    <section class="content">
        <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST">
            <input type="hidden" name="id" value="<?= $quanTri['id'] ?>">

            <div class="card-body">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="ten"
                            value="<?= htmlspecialchars($old['ten'] ?? $quanTri['ten']) ?>">
                    <?php if (!empty($errors['ten'])): ?>
                        <p class="text-danger"><?= $errors['ten'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Họ</label>
                    <input type="text" class="form-control" name="ho"
                            value="<?= htmlspecialchars($old['ho'] ?? $quanTri['ho']) ?>">
                    <?php if (!empty($errors['ho'])): ?>
                        <p class="text-danger"><?= $errors['ho'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"
                            value="<?= htmlspecialchars($old['email'] ?? $quanTri['email']) ?>">
                    <?php if (!empty($errors['email'])): ?>
                        <p class="text-danger"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" class="form-control" name="dien_thoai"
                            value="<?= htmlspecialchars($old['dien_thoai'] ?? $quanTri['dien_thoai']) ?>">
                    <?php if (!empty($errors['dien_thoai'])): ?>
                        <p class="text-danger"><?= $errors['dien_thoai'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi"
                            value="<?= htmlspecialchars($old['dia_chi'] ?? $quanTri['dia_chi']) ?>">
                    <?php if (!empty($errors['dia_chi'])): ?>
                        <p class="text-danger"><?= $errors['dia_chi'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Thành phố</label>
                    <input type="text" class="form-control" name="thanhpho"
                            value="<?= htmlspecialchars($old['thanhpho'] ?? $quanTri['thanhpho']) ?>">
                    <?php if (!empty($errors['thanhpho'])): ?>
                        <p class="text-danger"><?= $errors['thanhpho'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Ngày cập nhật</label>
                    <input type="datetime-local" class="form-control" name="ngay_capnhat"
                            value="<?= htmlspecialchars(
                                isset($old['ngay_capnhat']) 
                                ? $old['ngay_capnhat'] 
                                : (new DateTime($quanTri['ngay_capnhat']))->format('Y-m-d\TH:i')
                            ) ?>">
                    <?php if (!empty($errors['ngay_capnhat'])): ?>
                        <p class="text-danger"><?= $errors['ngay_capnhat'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Vai trò</label>
                    <select class="form-control" name="vai_tro">
                        <option disabled>Chọn vai trò</option>
                        <option value="1" <?= ($old['vai_tro'] ?? $quanTri['vai_tro']) == '1' ? 'selected' : '' ?>>Admin</option>
                        <option value="2" <?= ($old['vai_tro'] ?? $quanTri['vai_tro']) == '2' ? 'selected' : '' ?>>Nhân viên</option>
                    </select>
                    <?php if (!empty($errors['vai_tro'])): ?>
                        <p class="text-danger"><?= $errors['vai_tro'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
