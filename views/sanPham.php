<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<body class="bg-gray-50">
<div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-4 gap-8">

    <!-- Sidebar Lọc -->
    <aside class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold text-pink-600 mb-4">Bộ lọc</h2>

        <form action="" method="GET" class="space-y-4">
            <input type="hidden" name="act" value="danh-sach-san-pham">

            <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    placeholder="Tìm kiếm sản phẩm...">

            <!-- Lọc theo danh mục -->
            <div>
                <label class="font-semibold block mb-2">Danh mục</label>
                <select name="danhmuc" class="w-full border rounded-lg px-4 py-2">
                    <option value="">-- Tất cả --</option>
                    <?php foreach ($listDanhMuc as $dm): ?>
                        <option value="<?= $dm['id'] ?>" <?= isset($_GET['danhmuc']) && $_GET['danhmuc'] == $dm['id'] ? 'selected' : '' ?>>
                            <?= $dm['ten'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Lọc theo giá -->
            <div>
                <label class="font-semibold block mb-2">Khoảng giá</label>
                <div class="grid grid-cols-2 gap-2">
                    <input type="number" name="gia_min" value="<?= $_GET['gia_min'] ?? '' ?>"
                            class="border rounded-lg px-2 py-1" placeholder="Từ (₫)">
                    <input type="number" name="gia_max" value="<?= $_GET['gia_max'] ?? '' ?>"
                            class="border rounded-lg px-2 py-1" placeholder="Đến (₫)">
                </div>
            </div>

            <!-- Sắp xếp theo giá -->
            <div>
                <label class="font-semibold block mb-2">Sắp xếp</label>
                <select name="sort" class="w-full border rounded-lg px-4 py-2">
                    <option value="">-- Không sắp xếp --</option>
                    <option value="asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'asc') ? 'selected' : '' ?>>Giá tăng dần</option>
                    <option value="desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'desc') ? 'selected' : '' ?>>Giá giảm dần</option>
                </select>
            </div>

            <button type="submit"
                    class="mt-4 w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Lọc sản phẩm
            </button>
        </form>
    </aside>

    <!-- Danh sách sản phẩm -->
    <div class="md:col-span-3">
        <h1 class="text-3xl font-bold text-pink-600 mb-6">Tất cả sản phẩm</h1>

        <?php if (!empty($listSanPham)): ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                <?php foreach ($listSanPham as $sp): ?>
                    <a href="<?= BASE_URL . '?act=chi-tiet-sp&id_sanpham=' . $sp['id'] ?>">
                        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg hover:scale-105 transition">
                            <img src="<?= BASE_URL . $sp['hinhanh'] ?>" alt="<?= $sp['ten'] ?>" class="w-full h-60 object-cover rounded">
                            <h3 class="text-center font-semibold mt-3"><?= $sp['ten'] ?></h3>
                            <p class="text-center text-pink-600 font-bold"><?= number_format($sp['gia_coso'], 0, ',', '.') ?>₫</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Phân trang -->
            <?php if ($totalPages > 1): ?>
                <div class="flex justify-center space-x-2">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
                            class="px-3 py-1 border rounded <?= ($i == $currentPage) ? 'bg-pink-600 text-white' : 'bg-white text-gray-700 hover:bg-pink-100' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p class="text-gray-500 italic">Không tìm thấy sản phẩm phù hợp.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
</body>
