<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng nhập</h2>
        <p class="login-box-msg text-center" style="color: red; font-size: 17px; ">
            Vui lòng Đăng Nhập
        </p>
        <form action="<?= BASE_URL . '?act=check-dang-nhap-client' ?>" method="post">
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
                <input type="email" id="email" name="email"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <span class="error-message">
                    <? !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                </span>
            </div>
            <!-- Mat Khau -->
             <div class="mb-4">      
                <label for="mat_khau" class="block text-sm font-medium text-gray-700">Mật khẩu:</label>
                <input type="password" id="mat_khau" name="mat_khau"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <span class="error-message">
                    <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
                </span>
             </div>

             <button type="submit" name="dangnhap"
             class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Đăng Nhập
             </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Đã có tài khoản?
                <a href="<?= BASE_URL . '?act=form-dang-ki-client' ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                    Đăng Ký
                </a>
            </p>
        </div>
    </div>
</body>
</html>