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
        <div class="container-fluid"><h1>Thêm sản phẩm</h1></div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data" class="card card-primary">
            <div class="card-header"><h3 class="card-title">Thông tin sản phẩm</h3></div>
            <div class="card-body">
            <?php
            function inputError($name, $error) {
                return !empty($error[$name]) ? 'is-invalid' : '';
            }
            function errorText($name, $error) {
                return !empty($error[$name]) ? '<div class="invalid-feedback">' . $error[$name] . '</div>' : '';
            }
            ?>

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control <?= inputError('ten', $error) ?>" name="ten" value="<?= htmlspecialchars($old['ten'] ?? '') ?>">
                <?= errorText('ten', $error) ?>
            </div>

            <div class="form-group">
                <label>Giá cơ sở</label>
                <input type="number" class="form-control <?= inputError('gia_coso', $error) ?>" name="gia_coso" value="<?= htmlspecialchars($old['gia_coso'] ?? '') ?>">
                <?= errorText('gia_coso', $error) ?>
            </div>

            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" class="form-control <?= inputError('hinhanh', $error) ?>" name="hinhanh">
                <?= errorText('hinhanh', $error) ?>
            </div>

            <div class="form-group">
                <label>Số lượng</label>
                <input type="number" class="form-control <?= inputError('cosan_stock', $error) ?>" name="cosan_stock" value="<?= htmlspecialchars($old['cosan_stock'] ?? '') ?>">
                <?= errorText('cosan_stock', $error) ?>
            </div>

            <div class="form-group">
                <label>Ngày cập nhật</label>
                <input type="datetime-local" class="form-control <?= inputError('ngay_capnhat', $error) ?>" name="ngay_capnhat" value="<?= htmlspecialchars($old['ngay_capnhat'] ?? '') ?>">
                <?= errorText('ngay_capnhat', $error) ?>
            </div>

            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control <?= inputError('id_danhmuc', $error) ?>" name="id_danhmuc">
                <option disabled selected>-- Chọn danh mục --</option>
                <?php foreach ($listDanhMuc as $dm): ?>
                    <option value="<?= $dm['id'] ?>" <?= ($old['id_danhmuc'] ?? '') == $dm['id'] ? 'selected' : '' ?>><?= $dm['ten'] ?></option>
                <?php endforeach; ?>
                </select>
                <?= errorText('id_danhmuc', $error) ?>
            </div>

            <div class="form-group">
                <label>Mã hàng</label>
                <input type="text" class="form-control <?= inputError('ma_hang', $error) ?>" name="ma_hang" value="<?= htmlspecialchars($old['ma_hang'] ?? '') ?>">
                <?= errorText('ma_hang', $error) ?>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control <?= inputError('trang_thai', $error) ?>" name="trang_thai">
                    <option value="">-- Chọn trạng thái --</option>
                    <option value="có sẵn" <?= ($old['trang_thai'] ?? '') == 'có sẵn' ? 'selected' : '' ?>>Có sẵn</option>
                    <option value="không có sẵn" <?= ($old['trang_thai'] ?? '') == 'không có sẵn' ? 'selected' : '' ?>>Hết hàng</option>
                </select>
                <?= errorText('trang_thai', $error) ?>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="mota" class="form-control"><?= htmlspecialchars($old['mota'] ?? '') ?></textarea>
            </div>
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </form>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
