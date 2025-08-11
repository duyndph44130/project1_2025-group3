<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

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


<?php if (!empty($_SESSION['success_message'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: '<?= $_SESSION['success_message'] ?>',
        confirmButtonText: 'OK'
    });

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

    $(".quantity-increase").click(function () {
        let id = $(this).data("id");
        let input = $("input.update-soluong[data-id='" + id + "']");
        let value = parseInt(input.val()) + 1;
        input.val(value).trigger("input");

        // Gửi về server
        $.post("?act=cap-nhat-gio-hang", {id_san_pham: id, so_luong: value});
    });

    $(".quantity-decrease").click(function () {
        let id = $(this).data("id");
        let input = $("input.update-soluong[data-id='" + id + "']");
        let value = parseInt(input.val());

        if (value > 1) {
            value = value - 1;
            input.val(value).trigger("input");

            // Gửi về server
            $.post("?act=cap-nhat-gio-hang", {id_san_pham: id, so_luong: value});
        }
    });

    $(".update-soluong").on("change", function() {
        let id_san_pham = $(this).data("id");
        let so_luong = $(this).val();

        $.post("?act=cap-nhat-gio-hang", {
        id_san_pham: id_san_pham,
        so_luong: so_luong
        }, function(res) {
            // Nếu muốn, bạn có thể xử lý JSON trả về tại đây
            // location.reload(); // Reload nếu cần
        });
    });
</script>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>
