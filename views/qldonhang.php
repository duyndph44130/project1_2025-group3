<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Mua Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100 font-sans">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-pink-600 text-center mb-6">Lịch Sử Mua Hàng </h2>

        <div class="flex justify-center mb-6">
            <input type="text" id="searchInput" placeholder="Tìm kiếm đơn hàng..."
                class="px-4 py-2 border border-pink-300 rounded-l-md focus:ring-2 focus:ring-pink-400 outline-none">
            <button type="button" id="searchBtn"
                class="px-4 py-2 bg-pink-500 text-white rounded-r-md hover:bg-pink-600 transition-all">Tìm kiếm</button>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-center">
                <thead class="bg-pink-400 text-white">
                    <tr>
                        <th class="py-3">Mã Đơn Hàng</th>
                        <th class="py-3">Ngày Đặt</th>
                        <th class="py-3">Tổng Tiền</th>
                        <th class="py-3">Thanh Toán</th>
                        <th class="py-3">Trạng Thái</th>
                        <th class="py-3">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($donHang as $donHangs): ?>
                        <tr class="border-b hover:bg-pink-50 transition-all">
                            <td class="py-3"><?= $donHangs['phien_token']  ?></td>
                            <td class="py-3"><?= $donHangs['ngay_capnhat'] ?></td>
                            <td class="py-3"><?= number_format($donHangs['tong_gia'], 0, ',', '.') ?> đ</td>
                            <td class="py-3"><?= $donHangs['phuongthuc_thanhtoan'] ?></td>
                            <td class="py-3"><?= $donHangs['trangthai'] ?></td>
                            <td class="py-3">
                                <a href="?act=chi-tiet-mua-hang&id=<?= $donHangs['id'] ?>"><button class="px-3 py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600">Chi tiết</button> </a>
                                <?php if ($donHangs['trangthai'] == 'xử lý'): ?>
                                    <a href="?act=huy-don-hang&id=<?= $donHangs['id'] ?>"><button class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Bạn muốn hủy đơn hàng?')">Hủy đơn hàng</button></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchBtn').addEventListener('click', function() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>

</html>