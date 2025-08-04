<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 p-8 overflow-x-hidden">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
        <form action="?act=xu-li-thanh-toan" method="POST">
            <h2 class="text-pink-500 text-2xl font-bold mb-4">Thông tin thanh toán</h2>
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="ten" placeholder="Họ và tên *" value="<?= $user['ten'] ?>" class="border p-2 rounded w-full">
                <input type="text" name="email" placeholder="Email *" value="<?= $user['email'] ?> " class="border p-2 rounded w-full">
                <input type="text" name="dien_thoai" placeholder="Số điện thoại *" value="<?= $user['dien_thoai'] ?>" class="border p-2 rounded w-full">
                <input type="text" name="dia_chi" placeholder="Địa chỉ *" value="<?= $user['dia_chi'] ?> " class="border p-2 rounded w-full">
                <textarea class="border p-2  " name="vanchuyen_thanhpho" placeholder="Ghi chú đơn hàng" id=""></textarea>

            </div>

            <h2 class="text-pink-500 text-2xl font-bold mt-6 mb-4">Đơn hàng của bạn</h2>
            <div class="border-b pb-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-pink-500 font-bold">
                            <th class="p-2">SẢN PHẨM</th>
                            <th class="p-2">ĐƠN GIÁ</th>
                            <th class="p-2">SỐ LƯỢNG</th>
                            <th class="p-2 text-right">THÀNH TIỀN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tong_tien = 0;
                        foreach ($chi_tiet_gio_hang as $gioHang):
                            $gia_san_pham =  $gioHang['gia_coso'];
                            $thanh_tien = $gia_san_pham * $gioHang['so_luong'];
                            $tong_tien += $thanh_tien;
                        ?>
                            <tr>
                                <td class="p-2"><?= $gioHang['ten'] ?></td>
                                <td class="p-2"><?= number_format($gioHang['gia_coso'], 0, ',', '.')  ?></td>
                                <td class="p-2"><?= $gioHang['so_luong'] ?> </td>

                                <td class="p-2 text-right"><?= number_format($thanh_tien, 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right mt-4">
                    <p class="text-gray-700">TẠM TÍNH: <span class="font-bold"><?= number_format($tong_tien, 0, ',', '.') ?> đ</span></p>
                    <p class="text-gray-700">GIAO HÀNG: <span class="font-bold">35.000 đ</span></p>
                    <p class="text-lg font-bold text-gray-900">TỔNG: <span><?= number_format($tong_tien + 35000, 0, ',', '.') ?> đ</span></p>
                    <input type="hidden" name="tong_gia" value="<?= $tong_tien + 35000 ?>">
                </div>
            </div>

            <div class="mt-4">
                <p for="">Phương thức thanh toán</p>
                <label class="flex items-center text-gray-700">
                    <input type="radio" name="phuongthuc_thanhtoan" value="Thanh toán khi nhận hàng " checked class="mr-2">
                    Thanh toán khi nhận hàng
                </label>
            </div>

            <button type="submit" class="bg-pink-500 text-white p-3 rounded-lg w-full mt-4 hover:bg-pink-600">
                Đặt hàng
            </button>
        </form>
    </div>

    <script>
        setTimeout(function() {
            let alertBox = document.querySelector('.fixed.top-5');
            if (alertBox) {
                alertBox.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 3000);
    </script>
</body>

</html>