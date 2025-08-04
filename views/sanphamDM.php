<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="max-w-7xl mx-auto my-6"> <!-- Thêm margin trên và dưới -->
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
    </div>
</body>
<?php require_once 'layout/footer.php' ?>

</html>