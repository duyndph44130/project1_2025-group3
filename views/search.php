<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Quần áo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200 font-sans">
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-pink-700 mb-6">Kết quả tìm kiếm</h2>

        <?php if (count($dataSearch) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($dataSearch as $SanPham): ?>
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <img src="<?= $SanPham['hinhanh'] ?? '' ?>" alt="" class="w-full h-60 object-cover rounded-md">
                        <div class="text-center py-4">
                            <p class="text-lg font-semibold text-gray-800"> <?= $SanPham['ten'] ?? '' ?> </p>
                            <p class="text-pink-600 text-xl font-bold mt-2"> <?= number_format($SanPham['gia_coso'] ?? 0, 0, ',', '.') ?>đ </p>
                        </div>
                        <div class="flex justify-center">
                            <a href="?act=chi-tiet-sp&id_sanpham=<?= $SanPham['id'] ?>">
                                <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full flex items-center gap-2 transition duration-300">
                                    <i class="fa-solid fa-eye"></i> Xem chi tiết
                                </button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-700 text-lg">Không tìm thấy sản phẩm nào.</p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php require_once 'layout/footer.php'; ?>