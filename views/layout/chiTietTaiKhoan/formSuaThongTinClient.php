<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200 overflow-x-hidden">
    <div class="container mx-auto mt-10 p-10 bg-white shadow-lg rounded-lg max-w-2xl relative">
        <!-- Nút quay lại -->
        <a href="javascript:history.back()" class="absolute top-4 left-4 text-pink-600 hover:text-pink-800 font-bold">
            ← Quay lại
        </a>

        <h2 class="text-center text-3xl font-bold text-pink-600">Chỉnh sửa thông tin cá nhân</h2>
        <form action="?act=sua-thong-tin-client" method="POST" enctype="multipart/form-data" class="mt-6">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <div class="mb-4">
                <label class="block text-pink-700 font-bold">Họ và tên:</label>
                <input type="text" name="ten" class="w-full p-3 border rounded-lg" value="<?= $user['ten'] ?? '' ?>">
                <span class="text-red-500"> <?= $_SESSION['errors']['ten'] ?? '' ?> </span>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-bold">Email:</label>
                <input type="email" name="email" class="w-full p-3 border rounded-lg" value="<?= $user['email'] ?? '' ?>">
                <span class="text-red-500"> <?= $_SESSION['errors']['email'] ?? '' ?> </span>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-bold">Số điện thoại:</label>
                <input type="tel" name="dien_thoai" class="w-full p-3 border rounded-lg" value="<?= $user['dien_thoai'] ?? '' ?>">
                <span class="text-red-500"> <?= $_SESSION['errors']['dien_thoai'] ?? '' ?> </span>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-bold">Địa chỉ:</label>
                <input type="text" name="dia_chi" class="w-full p-3 border rounded-lg" value="<?= $user['dia_chi'] ?? '' ?>">
                <span class="text-red-500"> <?= $_SESSION['errors']['dia_chi'] ?? '' ?> </span>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-bold">Mật khẩu:</label>
                <input type="password" name="mat_khau" class="w-full p-3 border rounded-lg" value="<?= $user['mat_khau'] ?? '' ?>">
                <span class="text-red-500"> <?= $_SESSION['errors']['mat_khau'] ?? '' ?> </span>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700">Cập nhật</button>
            </div>

        </form>
    </div>
</body>

</html>