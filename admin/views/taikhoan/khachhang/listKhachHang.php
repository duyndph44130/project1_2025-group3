<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2"><div class="col-sm-6"><h1>Danh sách khách hàng</h1></div></div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listKhachHang as $key => $khachHang): ?>
                        <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $khachHang['ten'] ?></td>
                        <td><?= $khachHang['email'] ?></td>
                        <td><?= $khachHang['dien_thoai'] ?></td>
                        <td><?= $khachHang['vai_tro'] ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khachhang=' . $khachHang['id'] ?>" class="btn btn-primary btn-sm">Chi tiết</a>
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khachhang=' . $khachHang['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quantri=' . $khachHang['id'] ?>" onclick="return confirm('Bạn có muốn reset mật khẩu tài khoản này không?')" class="btn btn-danger btn-sm">Reset</a>
                        </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
$(function() {
    $("#example1").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
