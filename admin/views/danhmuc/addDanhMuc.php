<?php
include './views/layout/header.php';
include './views/layout/navbar.php';
include './views/layout/sidebar.php';

$error = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm danh mục</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin danh mục</h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST" id="addDanhMucForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten">Tên danh mục <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= isset($error['ten']) ? 'is-invalid' : '' ?>" 
                                            id="ten" name="ten" placeholder="Nhập tên danh mục" 
                                            value="<?= htmlspecialchars($old['ten'] ?? '') ?>">
                                    <?php if (isset($error['ten'])): ?>
                                        <div class="invalid-feedback"><?= $error['ten'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="mieuta">Mô tả</label>
                                    <textarea class="form-control <?= isset($error['mieuta']) ? 'is-invalid' : '' ?>" 
                                                id="mieuta" name="mieuta" placeholder="Nhập mô tả" rows="4"><?= htmlspecialchars($old['mieuta'] ?? '') ?></textarea>
                                    <?php if (isset($error['mieuta'])): ?>
                                        <div class="invalid-feedback"><?= $error['mieuta'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="ngay_capnhat">Ngày cập nhật <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control <?= isset($error['ngay_capnhat']) ? 'is-invalid' : '' ?>" 
                                            id="ngay_capnhat" name="ngay_capnhat" 
                                            value="<?= isset($old['ngay_capnhat']) ? date('Y-m-d\TH:i', strtotime($old['ngay_capnhat'])) : date('Y-m-d\TH:i') ?>">
                                    <?php if (isset($error['ngay_capnhat'])): ?>
                                        <div class="invalid-feedback"><?= $error['ngay_capnhat'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                <a href="<?= BASE_URL_ADMIN ?>?act=danh-muc" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

</body>
</html>