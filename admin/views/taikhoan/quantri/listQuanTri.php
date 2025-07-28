<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản quản trị</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Flash message -->
            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
                <?php unset($_SESSION['success']); ?>
            <?php elseif (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Thêm tài khoản</button>
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Mật khẩu</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Thành phố</th>
                                        <th>Vai trò</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listQuanTri as $quanTri): ?>
                                        <tr>
                                            <td class="text-center"><?= htmlspecialchars($quanTri['id']) ?></td>
                                            <td><?= htmlspecialchars($quanTri['ho']) ?></td>
                                            <td><?= htmlspecialchars($quanTri['ten']) ?></td>
                                            <td><?= htmlspecialchars($quanTri['email']) ?></td>
                                            <td>
                                                <?= htmlspecialchars(substr($quanTri['mat_khau'], 0, 10)) ?>...
                                            </td>
                                            <td><?= htmlspecialchars($quanTri['dien_thoai']) ?></td>
                                            <td><?= htmlspecialchars($quanTri['dia_chi']) ?></td>
                                            <td><?= htmlspecialchars($quanTri['thanhpho']) ?></td>
                                            <td class="text-center">
                                                <?= $quanTri['vai_tro'] === 'admin' ? 'Quản trị viên' : 'Người dùng' ?>
                                            </td>
                                            <td><?= htmlspecialchars($quanTri['ngay_capnhat']) ?></td>
                                            <td class="text-center">
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quantri=' . $quanTri['id'] ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quantri=' . $quanTri['id'] ?>"
                                                    onclick="return confirm('Bạn có chắc muốn reset mật khẩu không?')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-sync-alt"></i> Reset
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-khach-hang&id_khachhang=' . $quanTri['id'] ?>"
                                                onclick="return confirm('Bạn có chắc muốn xoá tài khoản này chứ?')"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Xoá
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</body>
</html>
