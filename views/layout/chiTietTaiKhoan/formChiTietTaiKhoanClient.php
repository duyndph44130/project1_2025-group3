<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/menu.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100 overflow-x-hidden">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen bg-pink-200 p-5 shadow-lg">
            <div class="flex justify-center mb-5">
                <img src="https://cdn.pixabay.com/photo/2016/03/31/19/58/avatar-1295429_1280.png"
                    alt="Avatar"
                    class="w-32 h-32 rounded-full border-4 border-white object-cover">
            </div>
            <ul class="space-y-4">
                <li>
                    <a href="?act=form-sua-thong-tin-client" class="block bg-pink-400 text-white text-center py-2 rounded-lg hover:bg-pink-500">Sửa thông tin cá nhân</a>
                </li>
                <li>
                    <a href="?act=form-dang-nhap-client" class="block bg-red-400 text-white text-center py-2 rounded-lg hover:bg-red-500">Đăng xuất</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Thông tin tài khoản cá nhân</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block font-semibold">Họ và tên:</label>
                        <input disabled type="text" name="ho_ten" value="<?= $user['ten'] ?? '' ?>"
                            class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Email:</label>
                        <input disabled type="email" name="email" value="<?= $user['email'] ?? '' ?>"
                            class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Số điện thoại:</label>
                        <input disabled type="tel" name="so_dien_thoai" value="<?= $user['dien_thoai'] ?? '' ?>"
                            class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Địa chỉ:</label>
                        <input disabled type="text" name="dia_chi" value="<?= $user['dia_chi'] ?? '' ?>"
                            class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Vai trò:</label>
                        <input disabled name="vai_tro" value="<?= $user['vai_tro'] ?? '' ?>"
                            class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>