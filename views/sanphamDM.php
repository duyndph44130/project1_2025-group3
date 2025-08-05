<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<body>
    <h1 class="max-w-7xl mx-auto p-6 text-4xl font-bold text-pink-600 "><?= $cate['ten'] ?></h1>
    <div class="max-w-7xl mx-auto my-6">
        <?php if (!empty($listSanPham)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($listSanPham as $sanPham): ?>
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <a href="<?= BASE_URL . '?act=chi-tiet-sp&id_sanpham=' . $sanPham['id'] ?>">
                            <img src="<?= BASE_URL . $sanPham['hinhanh'] ?>" alt="" class="w-full rounded-lg hover-img">
                            <p class="text-center font-bold text-pink-600 py-4"><?= $sanPham['ten'] ?></p>
                        </a>
                        <p class="text-pink-600 text-xl font-bold text-center">
                            <?= number_format($sanPham['gia_coso'], 0) ?>₫
                        </p>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="text-center text-gray-500 italic py-10">
                Chưa có sản phẩm nào thuộc danh mục này.
            </div>
        <?php endif; ?>
    </div>
</body>

<?php require_once 'layout/footer.php' ?>
