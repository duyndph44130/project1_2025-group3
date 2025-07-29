<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Cập nhật trạng thái bình luận</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-trang-thai-binh-luan' ?>" method="post">
                <input type="hidden" name="id_binhluan" value="<?= htmlspecialchars($binhluan['id']) ?>">
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['noi_dung']) ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID Sản phẩm</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['id_san_pham']) ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID Người dùng</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['id_nguoi_dung']) ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Ngày đăng</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['ngay_dang']) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="trang_thai">Trạng thái</label>
                    <select name="trang_thai" id="trang_thai" class="form-control">
                        <option value="1" <?= $binhluan['trang_thai'] == 1 ? 'selected' : '' ?>>Đã duyệt</option>
                        <option value="0" <?= $binhluan['trang_thai'] == 0 ? 'selected' : '' ?>>Ẩn</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>