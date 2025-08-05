<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Đăng nhập</h1>
            <p class="text-gray-600 text-sm">Chào mừng bạn quay trở lại! Hãy đăng nhập để tiếp tục.</p>
        </div>

        <form action="<?= BASE_URL . '?act=check-dang-nhap-client' ?>" method="post" class="space-y-5">
            <?php if (!empty($_SESSION['error_message'])): ?>
            <div class="text-red-600 text-center font-semibold text-sm mb-4">
                <?= $_SESSION['error_message'] ?>
            </div>
            <?php endif; ?>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm" />
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                <span class="error-message"><?= $_SESSION['errors']['email'] ?></span>
                <?php endif; ?>
            </div>

            <!-- Mật khẩu -->
            <div>
                <label for="mat_khau" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input type="password" id="mat_khau" name="mat_khau"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm" />
                <?php if (!empty($_SESSION['errors']['mat_khau'])): ?>
                <span class="error-message"><?= $_SESSION['errors']['mat_khau'] ?></span>
                <?php endif; ?>
            </div>

            <!-- Nhớ đăng nhập -->
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2 text-sm text-gray-700">
                    <input type="checkbox" class="accent-indigo-500 rounded">
                    <span>Ghi nhớ đăng nhập</span>
                </label>
                <a href="#" class="text-sm text-indigo-500 hover:underline">Quên mật khẩu?</a>
            </div>

            <!-- Nút đăng nhập -->
            <button type="submit" name="dangnhap"
                class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition-all shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Đăng nhập
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Chưa có tài khoản?
            <a href="<?= BASE_URL . '?act=form-dang-ki-client' ?>" class="text-indigo-500 hover:text-indigo-600 font-medium">
                Đăng ký ngay
            </a>
        </div>
    </div>

    <!-- SweetAlert thông báo -->
    <?php if (!empty($_SESSION['success_message'])): ?>
    <script>
        Swal.fire({
            title: "Thành công!",
            text: "<?= $_SESSION['success_message'] ?>",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error_message'])): ?>
    <script>
        Swal.fire({
            title: "Lỗi!",
            text: "<?= $_SESSION['error_message'] ?>",
            icon: "error",
            confirmButtonText: "Đóng"
        });
    </script>
    <?php endif; ?>

    <?php if (!empty($_SESSION['warning_message'])): ?>
    <script>
        Swal.fire({
            title: "Cảnh báo!",
            text: "<?= $_SESSION['warning_message'] ?>",
            icon: "warning"
        });
    </script>
    <?php endif; ?>

    <!-- Xóa session lỗi sau khi hiển thị -->
    <?php unset($_SESSION['errors'], $_SESSION['success_message'], $_SESSION['error_message'], $_SESSION['warning_message']); ?>
</body>
</html>
