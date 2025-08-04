<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<body class="bg-pink-50 font-sans overflow-x-hidden">

    <!-- Banner & Sidebar -->
    <section class="mt-6 container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar Danh Mục -->
            <aside class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold text-pink-500 mb-6 text-center uppercase">Danh Mục Sản Phẩm</h2>
                <ul class="space-y-4">
                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                        <li>
                            <a href="<?= BASE_URL . '?act=san-pham&id_danhmuc=' . $danhMuc['id'] ?>" class="flex items-center space-x-2 text-gray-700 hover:text-pink-500 transition duration-200">
                                <i class="fas fa-shirt text-pink-400"></i>
                                <span class="font-medium"><?= $danhMuc['ten'] ?></span>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </aside>

            <!-- Banner Slider -->
            <div class="col-span-3">
                <div class="relative bg-white rounded-xl overflow-hidden shadow">
                    <div class="slideshow-container">
                        <div class="slide fade"><img src="./img/baner1.jpg" class="w-full h-[500px] object-cover rounded-lg"></div>
                        <div class="slide fade"><img src="./img/baner2.jpg" class="w-full h-[500px] object-cover rounded-lg"></div>
                        <div class="slide fade"><img src="./img/baner3.jpg" class="w-full h-[500px] object-cover rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dịch vụ nổi bật -->
    <section class="bg-white py-10 mt-10 shadow-inner">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="space-y-2">
                <i class="fas fa-shipping-fast text-4xl text-pink-500"></i>
                <h3 class="font-bold text-lg">Giao hàng siêu tốc</h3>
                <p class="text-gray-600 text-sm">Giao hàng nội thành chỉ trong 2h</p>
            </div>
            <div class="space-y-2">
                <i class="fas fa-undo text-4xl text-pink-500"></i>
                <h3 class="font-bold text-lg">Đổi trả dễ dàng</h3>
                <p class="text-gray-600 text-sm">Đổi trả miễn phí trong 7 ngày</p>
            </div>
            <div class="space-y-2">
                <i class="fas fa-headset text-4xl text-pink-500"></i>
                <h3 class="font-bold text-lg">Hỗ trợ 24/7</h3>
                <p class="text-gray-600 text-sm">Luôn lắng nghe và phục vụ bạn</p>
            </div>
        </div>
    </section>

    <!-- Danh mục nổi bật -->
    <section class="py-10">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8 text-pink-600">Danh mục nổi bật</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($listDanhMuc as $danhMuc) : ?>
                    <a href="<?= BASE_URL . '?act=san-pham&id_danhmuc=' . $danhMuc['id'] ?>" class="bg-white rounded-xl shadow hover:shadow-lg transform hover:-translate-y-1 transition duration-200">
                        <img src="./img/logo.png" alt="Hình danh mục" class="w-full h-40 object-contain p-4">
                        <p class="text-center font-bold text-pink-700 py-4"><?= $danhMuc['ten'] ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Sản phẩm nổi bật -->
    <section class="py-10 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8 text-pink-600">Sản phẩm nổi bật</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($listSanPham as $sanPham): ?>
                    <a href="<?= BASE_URL . '?act=chi-tiet-sp&id_sanpham=' . $sanPham['id'] ?>">
                        <div class="bg-pink-50 rounded-xl p-4 shadow hover:shadow-lg transition duration-200">
                            <img src="<?= BASE_URL . $sanPham['hinhanh'] ?>" alt="<?= $sanPham['ten'] ?>" class="w-full h-60 object-cover rounded">
                            <h3 class="text-lg font-semibold text-center mt-4 text-gray-800"><?= $sanPham['ten'] ?></h3>
                            <p class="text-center text-pink-600 font-bold text-xl mt-2"><?= number_format($sanPham['gia_coso'], 0) ?>₫</p>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <?php require_once 'layout/footer.php' ?>

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
</html>
