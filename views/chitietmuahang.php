<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đơn Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100 p-6 overflow-x-hidden">
    <div class="container mx-auto max-w-5xl bg-white p-6 rounded-lg shadow-lg mt-8 mb-8">
        <h2 class="text-2xl font-bold text-pink-500 text-center mb-6">Thông Tin Đơn Hàng</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bảng thông tin sản phẩm -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <table class="w-full border border-gray-300">
                    <thead class="bg-pink-500 text-white">
                        <tr>
                            <th class="p-2">Hình ảnh</th>
                            <th class="p-2">Tên sản phẩm</th>
                            <th class="p-2">Đơn giá</th>
                            <th class="p-2">Số lượng</th>
                            <th class="p-2">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chiTietDonHang as $item): ?>
                            <tr class="text-center border-b">
                                <td class="p-2">
                                    <img src="<?= $item['hinhanh'] ?>" alt="" class="w-16 h-16 object-cover mx-auto">
                                </td>
                                <td class="p-2"> <?= $item['ten'] ?> </td>
                                <td class="p-2 text-red-500 font-bold"> <?= number_format($item['gia'], 0, ',', '.') . ' đ' ?> </td>
                                <td class="p-2"> <?= $item['so_luong'] ?> </td>
                                <td class="p-2 font-bold"> <?= number_format($item['tong_gia'], 0, ',', '.') . ' đ' ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Bảng thông tin đơn hàng -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <table class="w-full border border-gray-300">
                    <thead class="bg-pink-500 text-white">
                        <tr>
                            <th class="p-2" colspan="2">Thông Tin Đơn Hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Mã đơn hàng:</td>
                            <td class="p-2"> <?= $donHang['phien_token'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Người nhận:</td>
                            <td class="p-2"> <?= $donHang['ten'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Email:</td>
                            <td class="p-2"> <?= $donHang['email'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Số điện thoại:</td>
                            <td class="p-2"> 0<?= $donHang['dien_thoai'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Địa chỉ:</td>
                            <td class="p-2"> <?= $donHang['dia_chi'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Ngày đặt:</td>
                            <td class="p-2"> <?= $donHang['ngay_capnhat'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Ghi chú:</td>
                            <td class="p-2"> <?= $donHang['vanchuyen_thanhpho'] ?> </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2 font-semibold">Phí vận chuyển:</td>
                            <td class="p-2 font-semibold text-red-500">35.000</td>
                        </tr>
                        <tr>
                            <td class="p-2 font-semibold text-lg">Tổng tiền:</td>
                            <td class="p-2 text-lg font-bold text-red-500"> <?= number_format($donHang['tong_gia'], 0, ',', '.') . ' đ' ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Nút quay lại danh sách đơn hàng -->
        <div class="text-center mt-6">
            <a href="?act=lich-su-mua-hang" class="px-6 py-2 bg-pink-500 text-white font-semibold rounded-lg shadow-md hover:bg-pink-600 transition duration-300">
                ⬅ Quay lại danh sách đơn hàng
            </a>
        </div>

    </div>
</body>

</html>
<?php require_once 'layout/footer.php'; ?>