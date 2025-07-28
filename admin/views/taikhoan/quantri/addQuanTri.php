<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<?php
    $error = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors'], $_SESSION['old']);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Thêm tài khoản quản trị</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST" class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin tài khoản</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="ten" value="<?= $old['ten'] ?? '' ?>" placeholder="Nhập tên">
                        <?php if (isset($error['ten'])): ?><p class="text-danger"><?= $error['ten'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Họ</label>
                        <input type="text" class="form-control" name="ho" value="<?= $old['ho'] ?? '' ?>" placeholder="Nhập họ">
                        <?php if (isset($error['ho'])): ?><p class="text-danger"><?= $error['ho'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $old['email'] ?? '' ?>" placeholder="Nhập email">
                        <?php if (isset($error['email'])): ?><p class="text-danger"><?= $error['email'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" class="form-control" name="dien_thoai" value="<?= $old['dien_thoai'] ?? '' ?>" placeholder="Nhập số điện thoại">
                        <?php if (isset($error['dien_thoai'])): ?><p class="text-danger"><?= $error['dien_thoai'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi" value="<?= $old['dia_chi'] ?? '' ?>" placeholder="Nhập địa chỉ">
                        <?php if (isset($error['dia_chi'])): ?><p class="text-danger"><?= $error['dia_chi'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Thành phố</label>
                        <input type="text" class="form-control" name="thanhpho" value="<?= $old['thanhpho'] ?? '' ?>" placeholder="Nhập thành phố">
                        <?php if (isset($error['thanhpho'])): ?><p class="text-danger"><?= $error['thanhpho'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Vai trò</label>
                        <select class="form-control" name="vai_tro">
                            <option disabled selected>-- Chọn vai trò --</option>
                            <option value="1" <?= (isset($old['vai_tro']) && $old['vai_tro'] == 1) ? 'selected' : '' ?>>Admin</option>
                            <option value="2" <?= (isset($old['vai_tro']) && $old['vai_tro'] == 2) ? 'selected' : '' ?>>Khách hàng</option>
                        </select>
                        <?php if (isset($error['vai_tro'])): ?><p class="text-danger"><?= $error['vai_tro'] ?></p><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Ngày cập nhật</label>
                        <input type="datetime-local" class="form-control" name="ngay_capnhat" value="<?= $old['ngay_capnhat'] ?? '' ?>">
                        <?php if (isset($error['ngay_capnhat'])): ?><p class="text-danger"><?= $error['ngay_capnhat'] ?></p><?php endif; ?>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>
