<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2"><div class="col-sm-6"><h1>Sửa khách hàng</h1></div></div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
            <input type="hidden" name="id" value="<?= $khachHang['id'] ?>">
            <div class="card card-primary">
                <div class="card-header"><h3 class="card-title">Khách hàng: <?= $khachHang['ten'] ?></h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="ten" value="<?= $khachHang['ten'] ?>">
                        <?php if (isset($error['ten'])): ?><p class="text-danger"><?= $error['ten'] ?></p><?php endif ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>">
                        <?php if (isset($error['email'])): ?><p class="text-danger"><?= $error['email'] ?></p><?php endif ?>
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" class="form-control" name="dien_thoai" value="<?= $khachHang['dien_thoai'] ?>">
                        <?php if (isset($error['dien_thoai'])): ?><p class="text-danger"><?= $error['dien_thoai'] ?></p><?php endif ?>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>">
                        <?php if (isset($error['dia_chi'])): ?><p class="text-danger"><?= $error['dia_chi'] ?></p><?php endif ?>
                    </div>
                    <div class="form-group">
                        <label>Thành phố</label>
                        <input type="text" class="form-control" name="thanhpho" value="<?= $khachHang['thanhpho'] ?>">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
