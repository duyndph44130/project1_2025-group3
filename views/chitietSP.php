<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="overflow-x-hidden">
    <div class="container mx-auto px-4 py-8 ">
        <div class="flex flex-wrap md:flex-nowrap gap-8">
            <!-- Hình ảnh sản phẩm -->
            <div class="w-full md:w-1/2">
                <img src="<?= BASE_URL . $sp['hinhanh'] ?>" alt="<?= $sp['ten'] ?>" class="w-full rounded-lg shadow-lg">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="w-full md:w-1/2 space-y-4"> <!-- Thêm space-y-4 để dãn cách dòng -->
                <h1 class="text-3xl font-bold text-pink-600"><?= $sp['ten'] ?></h1>
                <p class="mb-2">Mã sản phẩm: <?= $sp['ma_hang'] ?></p>
                <p class="mb-2">Số lượng sản phẩm: <?= $sp['cosan_stock'] ?></p>
                <p class="mb-2">Tình trạng:
                    <?php
                    if ($sp['cosan_stock'] == 0) {
                        echo 'Hết hàng';
                    } else {
                        echo 'Còn hàng';
                    }
                    ?>
                </p>
                <p class="text-2xl text-pink-600 font-bold mb-4">
                    <?= number_format($sp['gia_coso'], 0) ?>₫
                </p>

                <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                    <!-- Số lượng -->
                    <div class="flex items-center space-x-2 mb-4">
                        <button type="button" class="dau px-4 py-2 bg-gray-200 rounded-l-lg hover:bg-pink-500 hover:text-white transition duration-200" onclick="decreaseQuantity()">-</button>
                        <input type="hidden" name="id_san_pham" value="<?= $sp['id']; ?>">
                        <input readonly type="number" class="quantity w-16 text-center border border-gray-300 rounded-lg" id="quantity" name="so_luong" value="1" min="1">
                        <button type="button" class="dau px-4 py-2 bg-gray-200 rounded-r-lg hover:bg-pink-500 hover:text-white transition duration-200" onclick="increaseQuantity()">+</button>
                    </div>
                    <?php if ($sp['cosan_stock'] == 0): ?>
                        <div>
                            <button disabled class="bg-gray-400 text-white font-semibold py-2 px-4 rounded-lg cursor-not-allowed">Đã hết hàng</button>
                        </div>
                    <?php else: ?>
                        <div class="flex gap-4 mb-4">
                            <button type="submit" class="w-1/2 bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-lg">Thêm vào giỏ hàng</button>
                        </div>
                    <?php endif; ?>
                </form>

                <!-- Thông tin liên hệ -->
                <div class="flex items-center gap-2 text-pink-600 font-bold mb-4">
                    <span>📞</span>
                    <span>0878888907</span>
                </div>

                <!-- Đặc điểm nổi bật -->
                <h2 class="text-xl font-bold text-pink-600 mb-2">ĐẶC ĐIỂM NỔI BẬT</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2"> <!-- Thêm space-y-2 cho danh sách -->
                    <li>Chất liệu mềm mại, đảm bảo an toàn</li>
                    <li>Bông polyester 3D trắng cao cấp, đàn hồi cao</li>
                    <li>Đường may tỉ mỉ, chắc chắn</li>
                    <li>Đa dạng kích thước</li>
                    <li>Màu sắc tươi tắn</li>
                </ul>

                <!-- Khuyến mãi -->
                <div class="bg-pink-100 p-4 rounded-lg">
                    <h2 class="text-xl font-bold text-pink-600 mb-2">KHUYẾN MÃI</h2>
                    <ul class="list-disc list-inside text-pink-600 space-y-2"> <!-- Thêm space-y-2 cho danh sách -->
                        <li>Tặng kèm thiệp ý nghĩa: Thiệp sinh nhật, tình yêu, cảm ơn,...</li>
                        <li>Gói túi kính buộc nơ siêu xinh</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần bình luận sản phẩm -->
    <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Bình luận sản phẩm</h2>

        <!-- Danh sách bình luận -->
        <div class="space-y-4">
            <!-- Một bình luận mẫu -->
            <!-- <div class="border-b border-gray-200 pb-4">
            <h3 class="font-semibold text-gray-800">Nguyễn Văn A</h3>
            <p class="text-gray-600">Sản phẩm rất tốt, mình rất hài lòng!</p>
            <span class="text-sm text-gray-400">01/01/2025 14:30</span>
        </div> -->
            <?php if (!empty($listBinhLuan)): ?>
                <?php foreach ($listBinhLuan as $binhLuan): ?>
                    <div class="binh-luan">
                        <p><strong>Người dùng: <?= $binhLuan['ten_nguoi_dung']; ?></strong> - <?= $binhLuan['ngay_dang']; ?>
                        </p>
                        <p><?= $binhLuan['noi_dung']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có bình luận nào.</p>
            <?php endif; ?>
        </div>

        <!-- Form thêm bình luận mới -->
        <form action="?act=them-binh-luan" method="post" class="mt-4 space-y-4">
            <input type="hidden" name="id_san_pham" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500" value="<?= $sp['id']  ?>">
            <textarea name="noi_dung" placeholder="Nội dung bình luận" required rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500"></textarea>

            <button type="submit"
                class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Gửi bình luận
            </button>
        </form>
    </div>

    <script>
        const maxQuantity = <?= $sp['cosan_stock'] ?>;

        // Giảm số lượng sản phẩm
        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
            updateButtonState();
            toggleQuantityButtons();
        }

        // Tăng số lượng sản phẩm
        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity < maxQuantity) {
                quantityInput.value = currentQuantity + 1;
            } else {
                alert("Sản phẩm trong kho chỉ còn " + maxQuantity + " cái.");
            }
            updateButtonState();
            toggleQuantityButtons();
        }
    </script>

</body>
<?php require_once 'layout/footer.php' ?>

</html>