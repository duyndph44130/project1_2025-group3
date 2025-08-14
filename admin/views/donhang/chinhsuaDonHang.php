<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng: <?= htmlspecialchars($donHang['phien_token']) ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Chi tiết đơn hàng -->
                <div class="col-md-7">
                    <?php
                    // Xác định màu alert theo trạng thái
                    if ($donHang['trangthai'] == 'xử lý') {
                        $colorAlert = 'primary';
                    } elseif ($donHang['trangthai'] == 'vận chuyển') {
                        $colorAlert = 'warning';
                    } elseif ($donHang['trangthai'] == 'đã giao') {
                        $colorAlert = 'success';
                    } else {
                        $colorAlert = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAlert ?>" role="alert">
                        Đơn hàng: <?= htmlspecialchars($donHang['trangthai']) ?>
                    </div>

                    <div class="invoice p-3 mb-3">
                        <!-- Header đơn hàng -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Shop Quần áo 3TV
                                    <small class="float-right">Date: <?= htmlspecialchars($donHang['ngay_capnhat']) ?></small>
                                </h4>
                            </div>
                        </div>

                        <!-- Thông tin người đặt, người nhận, đơn hàng -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin người đặt</strong>
                                <address>
                                    Tên: <strong><?= htmlspecialchars($donHang['ten']) ?></strong><br>
                                    Email: <?= htmlspecialchars($donHang['email']) ?><br>
                                    Số điện thoại: 0<?= htmlspecialchars($donHang['dien_thoai']) ?><br>
                                    Địa chỉ: <?= htmlspecialchars($donHang['dia_chi']) ?><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin người nhận</strong>
                                <address>
                                    Tên: <strong><?= htmlspecialchars($donHang['ten_nguoinhan'] ?? $donHang['ten']) ?></strong><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin đơn hàng</strong>
                                <address>
                                    Mã đơn hàng: <strong><?= htmlspecialchars($donHang['phien_token']) ?></strong><br>
                                    Tổng tiền: <?= number_format($donHang['tong_gia'], 0, ',', '.') ?> VNĐ<br>
                                    Ghi chú: <?= htmlspecialchars($donHang['vanchuyen_thanhpho']) ?><br>
                                    Thanh toán: <?= htmlspecialchars($donHang['phuongthuc_thanhtoan'] ?? 'Tiền mặt') ?><br>
                                </address>
                            </div>
                        </div>

                        <!-- Danh sách sản phẩm -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= htmlspecialchars($sanPham['ten']) ?></td>
                                                <td><?= number_format($sanPham['gia'], 0, ',', '.') ?> VNĐ</td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= number_format($sanPham['tong_gia'], 0, ',', '.') ?> VNĐ</td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['tong_gia']; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <small class="float-right">Ngày đặt: <?= htmlspecialchars($donHang['ngay_capnhat']) ?></small>

                        <!-- Tổng tiền -->
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <td><?= number_format($tong_tien, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển</th>
                                            <td><?= number_format(35000, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng cộng:</th>
                                            <td><?= number_format($tong_tien + 35000, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form sửa đơn hàng -->
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng</h3>
                        </div>
                        <?php
                        $isLocked = ($donHang['trangthai'] === 'đã giao' || $donHang['trangthai'] === 'đã hủy');
                        $statusOrder = ['xử lý', 'vận chuyển', 'đã giao', 'đã hủy'];
                        $currentIndex = array_search($donHang['trangthai'], $statusOrder);
                        $allowedStatuses = array_slice($statusOrder, $currentIndex);
                        ?>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $donHang['id'] ?>">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="trangthai" class="form-control custom-select" <?= $isLocked ? 'disabled' : '' ?>>
                                    <?php foreach ($allowedStatuses as $status): ?>
                                        <option value="<?= $status ?>" <?= $status === $donHang['trangthai'] ? 'selected' : '' ?>>
                                            <?= $status ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" <?= $isLocked ? 'disabled' : '' ?>>Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End form sửa -->
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
