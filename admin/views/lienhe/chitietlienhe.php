<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (breadcrumb) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết liên hệ</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin liên hệ</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Họ tên:</strong>
                        <p class="text-muted"><?= htmlspecialchars($contact['ten']) ?></p>
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="text-muted"><?= htmlspecialchars($contact['email']) ?></p>
                    </div>

                    <div class="mb-3">
                        <strong>Tiêu đề:</strong>
                        <p class="text-muted"><?= htmlspecialchars($contact['tieu_de']) ?></p>
                    </div>

                    <div class="mb-3">
                        <strong>Nội dung:</strong>
                        <p class="text-muted"><?= nl2br(htmlspecialchars($contact['noi_dung'])) ?></p>
                    </div>

                    <div class="mb-3">
                        <strong>Ngày gửi:</strong>
                        <p class="text-muted"><?= htmlspecialchars($contact['ngay_gui']) ?></p>
                    </div>
                    
                    <div class="text-left">
                    <a href="<?= BASE_URL_ADMIN . '?act=lien-he' ?>" class="btn btn-primary">
                        ← Quay lại danh sách
                    </a>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
