<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

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

                        <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten">Tên danh mục</label>
                                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên danh mục" required>
                                    <?php if (!empty($error['ten'])): ?>
                                        <small class="text-danger"><?= $error['ten'] ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="mieuta">Mô tả</label>
                                    <textarea class="form-control" id="mieuta" name="mieuta" placeholder="Nhập mô tả"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="ngay_capnhat">Ngày cập nhật</label>
                                    <input type="datetime-local" class="form-control" id="ngay_capnhat" name="ngay_capnhat" value="<?= date('Y-m-d\TH:i') ?>">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                <a href="<?= BASE_URL_ADMIN ?>?act=danh-muc" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>
