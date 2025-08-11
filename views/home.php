<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<body class="bg-gradient-to-b from-purple-50 via-white to-pink-100 font-sans overflow-x-hidden">

    <!-- Hero Banner & Sidebar -->
    <section class="container mx-auto mt-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar Danh Mục -->
            <aside class="bg-white p-6 rounded-xl shadow-xl">
                <h2 class="text-xl font-bold text-pink-600 mb-6 text-center uppercase">Danh Mục</h2>
                <ul class="space-y-4">
                    <?php foreach ($listDanhMuc as $dm): ?>
                        <li>
                            <a href="<?= BASE_URL . '?act=san-pham&id_danhmuc=' . $dm['id'] ?>"
                                class="flex items-center space-x-2 text-gray-700 hover:text-pink-500 transition">
                                <i class="fas fa-angle-right text-pink-400"></i>
                                <span><?= $dm['ten'] ?></span>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </aside>

            <!-- Hero Banner -->
            <div class="col-span-3 relative rounded-xl overflow-hidden shadow-xl">
                <div class="slideshow-container rounded-xl">
                    <div class="slide fade"><img src="./img/baner1.jpg" class="w-full h-[450px] object-cover"></div>
                    <div class="slide fade"><img src="./img/baner2.jpg" class="w-full h-[450px] object-cover"></div>
                    <div class="slide fade"><img src="./img/baner3.jpg" class="w-full h-[450px] object-cover"></div>
                </div>
                <div class="absolute top-0 left-0 w-full h-full bg-black/20 flex items-center justify-center">
                    <h2 class="text-white text-4xl font-bold tracking-widest drop-shadow-xl">THỜI TRANG 3TV</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Dịch vụ nổi bật -->
    <section class="py-10 bg-gradient-to-br from-pink-100 to-white">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
            
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
                <i class="fas fa-shipping-fast text-5xl text-pink-500 mb-4"></i>
                <h3 class="text-lg font-semibold text-pink-600 mb-1">Giao hàng siêu tốc</h3>
                <p class="text-gray-600 text-sm">Giao toàn quốc chỉ 2 giờ nội thành</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
                <i class="fas fa-gift text-5xl text-pink-500 mb-4"></i>
                <h3 class="text-lg font-semibold text-pink-600 mb-1">Đóng gói thời trang</h3>
                <p class="text-gray-600 text-sm">Mỗi đơn hàng đều được đóng hộp cẩn thận</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
                <i class="fas fa-headset text-5xl text-pink-500 mb-4"></i>
                <h3 class="text-lg font-semibold text-pink-600 mb-1">Hỗ trợ 24/7</h3>
                <p class="text-gray-600 text-sm">Luôn sẵn sàng lắng nghe bạn</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
                <i class="fas fa-exchange-alt text-5xl text-pink-500 mb-4"></i>
                <h3 class="text-lg font-semibold text-pink-600 mb-1">Đổi trả dễ dàng</h3>
                <p class="text-gray-600 text-sm">Đổi trả trong vòng 7 ngày miễn phí</p>
            </div>

        </div>
    </section>


    <!-- Danh mục nổi bật -->
    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-10 uppercase">Danh Mục Hot</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php foreach ($listDanhMuc as $dm): ?>
                    <a href="<?= BASE_URL . '?act=san-pham&id_danhmuc=' . $dm['id'] ?>"
                        class="bg-gradient-to-tr from-white to-pink-50 rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition text-center p-5">
                        <img src="img/logo3TV.jpg" alt="<?= $dm['ten'] ?>" class="w-full h-32 object-contain mb-3">
                        <p class="text-purple-700 font-semibold text-lg">#<?= $dm['ten'] ?></p>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Sản phẩm nổi bật -->
    <section class="py-12 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-pink-600 mb-10 uppercase">Sản Phẩm Nổi Bật</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($listSanPham as $sp): ?>
                    <a href="<?= BASE_URL . '?act=chi-tiet-sp&id_sanpham=' . $sp['id'] ?>">
                        <div class="bg-white border border-pink-100 rounded-xl p-4 shadow hover:shadow-xl hover:scale-105 transition">
                            <img src="<?= BASE_URL . $sp['hinhanh'] ?>" alt="<?= $sp['ten'] ?>" class="w-full h-60 object-cover rounded">
                            <h3 class="text-center font-semibold mt-3 text-gray-800"><?= $sp['ten'] ?></h3>
                            <p class="text-center text-pink-600 font-bold mt-1 text-lg">
                                <?= number_format($sp['gia_coso'], 0, ',', '.') ?>₫
                            </p>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Sản phẩm mới -->
    <section class="py-12 bg-gradient-to-b from-pink-50 to-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-10 uppercase">Sản Phẩm Mới Nhất</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($sanPhamMoi as $sp): ?>
                    <a href="<?= BASE_URL . '?act=chi-tiet-sp&id_sanpham=' . $sp['id'] ?>">
                        <div class="bg-white border border-purple-100 rounded-xl p-4 shadow hover:shadow-xl hover:scale-105 transition">
                            <img src="<?= BASE_URL . $sp['hinhanh'] ?>" alt="<?= $sp['ten'] ?>" class="w-full h-60 object-cover rounded">
                            <h3 class="text-center font-semibold mt-3 text-gray-800"><?= $sp['ten'] ?></h3>
                            <p class="text-center text-pink-600 font-bold mt-1 text-lg">
                                <?= number_format($sp['gia_coso'], 0, ',', '.') ?>₫
                            </p>
                            <span class="block text-center text-xs text-green-600 mt-1 italic">Mới trong tháng</span>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <?php require_once 'layout/footer.php'; ?>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlides() {
            slides.forEach((slide, index) => {
                slide.style.display = index === currentIndex ? "block" : "none";
            });
            currentIndex = (currentIndex + 1) % slides.length;
        }

        setInterval(showSlides, 4000);
        showSlides();
    </script>
</body>
