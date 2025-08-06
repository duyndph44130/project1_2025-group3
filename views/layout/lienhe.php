<?php require_once 'header.php' ?>
<?php require_once 'menu.php' ?>

<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="max-w-6xl mx-auto px-6 py-10">
        <!-- Hero Section -->
        <section class="relative p-10 text-center mb-16">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-10 rounded-xl pointer-events-none"></div>
            <h1 class="relative z-10 text-6xl font-extrabold text-indigo-800 uppercase tracking-wide drop-shadow-lg">
                👕 3TV FASHION 👠
            </h1>
            <p class="relative z-10 mt-4 text-xl text-gray-700 font-medium max-w-3xl mx-auto leading-relaxed">
                <span class="inline-block bg-yellow-100 px-3 py-1 rounded-full text-yellow-800 font-semibold tracking-wide">
                    Định hình phong cách riêng bạn
                </span>
                <br class="hidden md:block">
                Thương hiệu <strong class="text-indigo-700">3TV</strong> cam kết mang đến trải nghiệm mua sắm thời trang cao cấp, hiện đại và đậm cá tính.
            </p>
            <div class="mt-6">
                <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full text-lg font-semibold shadow-lg transition">
                    👗 Khám phá bộ sưu tập
                </a>
            </div>
        </section>


        <!-- Giới thiệu -->
        <section class="bg-white shadow rounded-lg p-6 mb-10">
            <h2 class="text-2xl font-semibold text-indigo-600 mb-4">🌟 Về chúng tôi</h2>
            <p class="text-gray-700 leading-relaxed">
                <strong>3TV</strong> được thành lập vào năm 2025, với sứ mệnh mang đến những bộ sưu tập thời trang tinh tế, hợp xu hướng và phù hợp với mọi phong cách sống hiện đại. Không chỉ bán quần áo, chúng tôi trao gửi cảm hứng thời trang đến hàng triệu khách hàng.
            </p>
            <p class="mt-4 text-red-600 font-semibold">
                Hãy luôn nhận diện logo <span class="text-blue-700 font-bold">3TV</span> để đảm bảo bạn đang mua đúng hàng chính hãng!
            </p>
        </section>

        <!-- Cam kết thương hiệu -->
        <section class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048947.png" class="w-16 h-16 mx-auto mb-4" alt="Cam kết">
                <h3 class="text-xl font-semibold text-indigo-700">Chất lượng vượt trội</h3>
                <p class="text-gray-600 mt-2">Sản phẩm 100% chính hãng, kiểm định kỹ lưỡng trước khi giao hàng.</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077035.png" class="w-16 h-16 mx-auto mb-4" alt="Dịch vụ">
                <h3 class="text-xl font-semibold text-indigo-700">Phục vụ tận tâm</h3>
                <p class="text-gray-600 mt-2">Đội ngũ hỗ trợ 24/7, giải đáp và chăm sóc khách hàng tận tình.</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/4298/4298847.png" class="w-16 h-16 mx-auto mb-4" alt="Đổi trả">
                <h3 class="text-xl font-semibold text-indigo-700">7 ngày đổi trả miễn phí</h3>
                <p class="text-gray-600 mt-2">Yên tâm mua sắm với chính sách linh hoạt và rõ ràng.</p>
            </div>
        </section>

        <!-- Hệ thống showroom -->
        <section class="bg-white p-6 rounded-lg shadow mb-12">
            <h2 class="text-2xl font-semibold text-indigo-600 mb-4">📍 Hệ thống showroom toàn quốc</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-blue-600 mb-2">🏢 Hà Nội</h3>
                    <ul class="list-disc pl-5 text-gray-700 space-y-1">
                        <li>120 Cầu Giấy - Hotline: <span class="font-bold">087.8888.900</span></li>
                        <li>88 Đường Láng – Đống Đa - Hotline: <span class="font-bold">087.8888.900</span></li>
                        <li>58 Xuân Thủy – Cầu Giấy - Hotline: <span class="font-bold">087.8888.900</span></li>
                        <li>333 Nguyễn Văn Cừ – Long Biên - Hotline: <span class="font-bold">087.8888.900</span></li>
                        <li>25 Nguyễn Khuyến – Hà Đông - Hotline: <span class="font-bold">087.8888.900</span></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-600 mb-2">🏢 Hồ Chí Minh</h3>
                    <ul class="list-disc pl-5 text-gray-700 space-y-1">
                        <li>228 Âu Cơ, Tân Bình - Hotline: <span class="font-bold">09.6618.6622</span></li>
                        <li>99 Bàu Cát, Tân Bình - Hotline: <span class="font-bold">09.6618.6622</span></li>
                        <li>590 Quang Trung, Gò Vấp - Hotline: <span class="font-bold">037.838.6622</span></li>
                        <li>120 CMT8, Quận 3 - Hotline: <span class="font-bold">093.828.6622</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Lời mời kết nối -->
        <section class="text-center py-8 bg-indigo-50 rounded-lg shadow mb-10">
            <h2 class="text-2xl font-semibold text-indigo-700 mb-2">🎉 Kết nối với 3TV ngay hôm nay!</h2>
            <p class="text-gray-600 mb-4">Trở thành một phần của cộng đồng thời trang hàng đầu Việt Nam.</p>
            <a href="<?= BASE_URL . '?act=form-lien-he' ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded shadow transition">Liên hệ ngay</a>
        </section>

        <!-- Thông tin website -->
        <footer class="text-center text-sm text-gray-500 italic">
            Website chính thức: <a href="<?= BASE_URL ?>" class="text-blue-500 underline">https://3tv.vn</a><br>
            Mua sắm an toàn – Nhận hàng nhanh chóng – Phong cách thời thượng.
            <br><br>
            <a href="<?= BASE_URL . '?act=/' ?>" class="bg-red-500 hover:bg-red-700 text-white px-6 py-2 rounded shadow transition">Khám phá ngay!</a>
        </footer>
    </div>
</body>

<?php require_once 'footer.php' ?>
