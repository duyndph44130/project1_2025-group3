<?php require_once 'header.php' ?>
<?php require_once 'menu.php' ?>

    <!DOCTYPE html>
    <html lang="vi">

    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giới Thiệu - 3TV Shop</title>

    <!-- Font & CSS đã được khai báo trong header.php -->
    <style>
        .section-title {
        font-family: 'Pacifico', cursive;
        }

        .highlight {
        color: #ec4899; /* pink-500 */
        font-weight: bold;
        }
    </style>
    </head>

    <body class="bg-gray-50 text-gray-800">

    <header class="bg-gradient-to-r from-pink-400 via-pink-500 to-purple-500 text-white py-8 shadow-lg">
        <div class="container mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide section-title">Chào Mừng Đến Với <span class="text-yellow-300">3TV Shop</span></h1>
        <p class="mt-3 text-lg md:text-xl">Nơi phong cách và chất lượng hòa quyện</p>
        </div>
    </header>

    <main class="max-w-5xl mx-auto p-6 bg-white rounded-xl shadow-xl mt-8 space-y-10">

        <!-- Giới thiệu -->
        <section class="text-center">
        <h2 class="text-3xl font-semibold text-pink-600 mb-4">Về Chúng Tôi</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            <span class="highlight">3TV Shop</span> là thương hiệu thời trang hiện đại dành cho giới trẻ. Chúng tôi cung cấp sản phẩm <span class="highlight">đa dạng, chất lượng cao</span> với thiết kế độc đáo và hợp xu hướng.
            Đội ngũ của chúng tôi không ngừng đổi mới để mang lại trải nghiệm mua sắm tuyệt vời nhất cho bạn.
        </p>
        <img src="./img/logo3TV.jpg" alt="Logo 3TV" class="mx-auto mt-6 w-32 h-32 object-contain rounded-full shadow-lg border-4 border-pink-400">
        </section>

        <!-- Tầm nhìn và Sứ mệnh -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">🌍 Tầm Nhìn & Sứ Mệnh</h2>
        <p class="text-gray-700 leading-relaxed">
            Chúng tôi mong muốn trở thành thương hiệu thời trang dẫn đầu thị trường nội địa và mở rộng ra quốc tế.
            <span class="highlight">3TV Shop</span> không chỉ là nơi bạn mua sắm – đó là nơi khơi nguồn cảm hứng, giúp bạn tự tin thể hiện cá tính thông qua trang phục mỗi ngày.
        </p>
        </section>


        <!-- Hành trình phát triển -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">📖 Hành Trình Phát Triển</h2>
        <p class="text-gray-700 leading-relaxed">
            <span class="highlight">3TV Shop</span> được thành lập từ năm 2020 bởi ba nhà sáng lập trẻ đam mê thời trang và công nghệ.
            Bắt đầu từ một cửa hàng nhỏ, chúng tôi đã không ngừng nỗ lực xây dựng thương hiệu qua chất lượng sản phẩm, dịch vụ tận tâm và sự thấu hiểu khách hàng.
            Đến nay, 3TV đã trở thành một trong những cửa hàng thời trang online được yêu thích nhất trong cộng đồng giới trẻ Việt Nam.
        </p>
        </section>

        <!-- Giá trị cốt lỗi -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">💎 Giá Trị Cốt Lõi</h2>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li><strong>Chất lượng:</strong> Cam kết sử dụng nguyên liệu cao cấp và quy trình sản xuất kiểm định nghiêm ngặt.</li>
            <li><strong>Uy tín:</strong> Luôn minh bạch về sản phẩm, chính sách đổi trả rõ ràng và bảo hành đúng cam kết.</li>
            <li><strong>Đổi mới:</strong> Cập nhật xu hướng thời trang nhanh chóng, mang đến phong cách hiện đại và độc đáo.</li>
            <li><strong>Khách hàng là trung tâm:</strong> Tư vấn tận tình – chăm sóc sau bán hàng chu đáo – phản hồi 24/7.</li>
        </ul>
        </section>

        <!-- Cam kết dịch vụ -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">🛡️ Cam Kết Dịch Vụ</h2>
        <div class="grid md:grid-cols-2 gap-4 text-gray-700">
            <div>
            <p>✅ <strong>Miễn phí vận chuyển:</strong> Với đơn hàng từ 499.000₫ trở lên.</p>
            <p>✅ <strong>Đổi trả dễ dàng:</strong> Trong vòng 7 ngày với mọi lỗi từ nhà sản xuất.</p>
            <p>✅ <strong>Giao hàng toàn quốc:</strong> Hợp tác với các đơn vị vận chuyển uy tín.</p>
            <p>✅ <strong>Hỗ trợ trực tuyến:</strong> Đội ngũ tư vấn luôn sẵn sàng giải đáp thắc mắc của bạn.</p>
            </div>
        </div>
        </section>


        <!-- Danh mục -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">🛍️ Danh Mục Sản Phẩm</h2>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>👕 Áo thun, sơ mi, hoodie phong cách</li>
            <li>👖 Quần jeans, kaki, váy thời trang</li>
            <li>👜 Phụ kiện: túi xách, mũ, kính, dây chuyền</li>
        </ul>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-5">
            <img src="./uploads/1749619902sp2.jpeg" alt="Sản phẩm 1" class="w-full h-60 object-cover rounded-xl shadow">
            <img src="./uploads/1749619902sp2.jpeg" alt="Sản phẩm 2" class="w-full h-60 object-cover rounded-xl shadow">
        </div>
        </section>

        <!-- Liên hệ -->
        <section>
        <h2 class="text-2xl font-semibold text-purple-600 mb-3">📞 Liên Hệ</h2>
        <p class="text-gray-700">Nếu bạn có bất kỳ thắc mắc nào, đừng ngần ngại liên hệ với chúng tôi:</p>
        <div class="mt-3 space-y-2 text-lg">
            <p>📧 <span class="font-medium">Email:</span> support@3tvshop.vn</p>
            <p>📱 <span class="font-medium">Hotline:</span> 0352 614 404</p>
            <p>🌐 <span class="font-medium">Website:</span> <a href="<?= BASE_URL ?>" class="text-pink-600 underline hover:text-pink-800">www.3tvshop.vn</a></p>
        </div>
        </section>

        <!-- Kêu gọi hành động -->
        <section class="text-center">
        <h2 class="text-2xl font-semibold text-pink-600 mb-3">🛒 Mua Sắm Ngay Hôm Nay</h2>
        <p class="text-gray-600 mb-5">Hãy cùng khám phá bộ sưu tập mới nhất của chúng tôi và chọn cho mình phong cách phù hợp nhất!</p>
        <a href="?act=danh-sach-san-pham" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-full font-bold shadow transition">
            Khám Phá Ngay
        </a>
        </section>

    </main>

</body>
</html>
