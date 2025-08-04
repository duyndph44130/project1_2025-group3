<?php require_once 'header.php' ?>
<?php require_once 'menu.php' ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 p-8 overflow-x-hidden">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8 mb-8">
        <h2 class="text-pink-500 text-2xl font-bold mb-4">Giỏ hàng của bạn</h2>

        <div class="border-b pb-4">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-pink-500 font-bold">
                        <th class="p-2">SẢN PHẨM</th>
                        <th class="p-2">GIÁ</th>
                        <th class="p-2">SỐ LƯỢNG</th>
                        <th class="p-2">TẠM TÍNH</th>
                        <th class="p-2">XÓA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tong_tien = 0;
                    foreach ($chi_tiet_gio_hang as $gioHang):
                        $tam_tinh = $gioHang['gia_coso'] * $gioHang['so_luong'];
                        $tong_tien += $tam_tinh;
                    ?>
                        <tr class="border-t" id="row-<?= $gioHang['id_san_pham'] ?>">
                            <td class="p-2 flex items-center">
                                <img src="<?= $gioHang['hinhanh'] ?>" alt="Sản phẩm" class="w-16 h-16 mr-4">
                                <span><?= $gioHang['ten'] ?></span>
                            </td>
                            <td class="p-2 text-red-500 font-bold"><?= number_format($gioHang['gia_coso'], 0, ',', '.') . ' đ' ?></td>
                            <td class="p-2">
                                <input type="number" class="w-16 text-center border rounded-md update-soluong"
                                    data-id="<?= $gioHang['id_san_pham'] ?>"
                                    value="<?= $gioHang['so_luong'] ?>"
                                    min="1"
                                    data-goc="<?= $gioHang['so_luong'] ?>">
                            </td>

                            <td class="p-2 font-bold tam-tinh" id="tam-tinh-<?= $gioHang['id_san_pham'] ?>" data-gia="<?= $gioHang['gia_coso'] ?>">
                                <?= number_format($tam_tinh, 0, ',', '.') . ' đ' ?>
                            </td>
                            <td class="p-2">
                                <form action="?act=xoa-gio-hang" method="POST" onsubmit="return confirm('Bạn có đồng ý không')">
                                    <input type="hidden" name="chi_tiet_id" value="<?= $gioHang['id'] ?>">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Xóa</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex">
            <div class="ml-auto text-right"> <!-- Thêm ml-auto vào đây -->
                <div class="text-gray-700">TẠM TÍNH: <span class="font-bold" id="tong-tien"><?= number_format($tong_tien, 0, ',', '.') . ' đ' ?></span></div>
                <div class="text-gray-700">GIAO HÀNG: <span class="font-bold">35.000 đ</span></div>
                <div class="text-lg font-bold text-gray-900">TỔNG: <span id="tong-tien-cuoi"><?= number_format($tong_tien + 35000, 0, ',', '.') . ' đ' ?></span></div>
                <?php if (!empty($chi_tiet_gio_hang)): ?>
                    <a href="?act=thanh-toan">
                        <button class="bg-pink-500 text-white px-6 py-3 rounded-md mt-3 w-full hover:bg-pink-600">
                            TIẾN HÀNH THANH TOÁN
                        </button>
                    </a>
                <?php else: ?>
                    <a href="?act=home">
                        <p class="text-red-500 text-center mt-4 bg-red-100 border border-red-400 rounded-md p-3">
                            Vui lòng về trang chủ chọn sản phẩm.
                        </p>
                    </a>
                <?php endif; ?>

            </div>
        </div>

    </div>

    <?php require_once 'footer.php' ?>

    <script>
        $(document).ready(function() {
            $(".update-soluong").each(function() {
                $(this).val($(this).attr("data-goc")); // Reset số lượng về giá trị gốc
            });

            $(".update-soluong").on("input", function() {
                let id_san_pham = $(this).data("id");
                let so_luong = $(this).val();
                let gia_coso = parseInt($("#tam-tinh-" + id_san_pham).attr("data-gia")); // Lấy giá sản phẩm từ data-gia

                if (so_luong < 1) {
                    so_luong = 1;
                    $(this).val(1);
                }

                let tam_tinh = gia_coso * so_luong;
                $("#tam-tinh-" + id_san_pham).text(tam_tinh.toLocaleString("vi-VN") + " đ");

                let tong_tien = 0;
                $(".tam-tinh").each(function() {
                    tong_tien += parseInt($(this).text().replace(/\D/g, ""));
                });

                $("#tong-tien").text(tong_tien.toLocaleString("vi-VN") + " đ");
                $("#tong-tien-cuoi").text((tong_tien + 35000).toLocaleString("vi-VN") + " đ");
            });
        });
    </script>

</body>

</html>