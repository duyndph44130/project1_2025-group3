<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Thông tin tài khoản khách hàng</h1>
            </div>
        </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                <tbody style="font-size: 16px;">
                    <tr><th>Tên:</th><td><?= $khachHang['ten'] ?></td></tr>
                    <tr><th>Email:</th><td><?= $khachHang['email'] ?></td></tr>
                    <tr><th>Số điện thoại:</th><td><?= $khachHang['dien_thoai'] ?></td></tr>
                    <tr><th>Địa chỉ:</th><td><?= $khachHang['dia_chi'] ?></td></tr>
                    <tr><th>Thành phố:</th><td><?= $khachHang['thanhpho'] ?? 'Chưa cập nhật' ?></td></tr>
                    <tr><th>Vai trò:</th><td><?= $khachHang['vai_tro'] ?></td></tr>
                </tbody>
                </table>
            </div>

            <div class="col-12">
                <h2>Đơn hàng đã mua</h2>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Phiên</th>
                            <th>Tên người nhận</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listDonHang as $key => $donHang): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $donHang['phien_token'] ?></td>
                            <td><?= $donHang['ten'] ?></td>
                            <td><?= $donHang['dien_thoai'] ?></td>
                            <td><?= $donHang['dia_chi'] ?></td>
                            <td><?= number_format($donHang['tong_gia'], 0, ',', '.') ?>₫</td>
                            <td><?= $donHang['trangthai'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_donhang=' . $donHang['id'] ?>"><button class="btn btn-primary btn-sm">Chi tiết</button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_donhang=' . $donHang['id'] ?>"><button class="btn btn-warning btn-sm">Sửa</button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
