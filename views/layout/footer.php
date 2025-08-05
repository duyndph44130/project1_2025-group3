<footer class="bg-gradient-to-br from-pink-100 to-purple-200 text-gray-800 pt-12 pb-8 mt-20">
    <div class="container mx-auto px-6">
        
        <!-- Section 1: Dịch vụ nổi bật -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10 text-center">
        <div class="space-y-2">
            <img src="https://cdn-icons-png.flaticon.com/512/104/104678.png" alt="Giao hàng nhanh" class="h-12 mx-auto">
            <h4 class="font-bold text-lg">Giao hàng nhanh</h4>
            <p class="text-sm text-gray-600">Giao toàn quốc siêu tốc</p>
        </div>
        <div class="space-y-2">
            <img src="https://cdn-icons-png.flaticon.com/512/189/189680.png" alt="Đổi trả dễ dàng" class="h-12 mx-auto">
            <h4 class="font-bold text-lg">Đổi trả 7 ngày</h4>
            <p class="text-sm text-gray-600">Đổi trả dễ dàng, nhanh chóng</p>
        </div>
        <div class="space-y-2">
            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Bảo mật thanh toán" class="h-12 mx-auto">
            <h4 class="font-bold text-lg">Bảo mật thanh toán</h4>
            <p class="text-sm text-gray-600">An toàn tuyệt đối cho mọi giao dịch</p>
        </div>
        <div class="space-y-2">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="Hỗ trợ 24/7" class="h-12 mx-auto">
            <h4 class="font-bold text-lg">Hỗ trợ 24/7</h4>
            <p class="text-sm text-gray-600">Chúng tôi luôn lắng nghe bạn</p>
        </div>
        </div>

        <!-- Section 2: Thông tin liên hệ & điều hướng -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12 text-sm">
        <div>
            <h3 class="text-lg font-bold text-pink-700 mb-3">TrendingShop</h3>
            <p>📍 Phương Canh, Hà Nội</p>
            <p>📞 0352614404</p>
            <p>✉️ 3tvshop@gmail.com</p>
        </div>

        <div>
            <h3 class="text-lg font-bold text-pink-700 mb-3">Hỗ trợ khách hàng</h3>
            <ul class="space-y-2">
            <li><a href="#" class="hover:text-pink-600">Chính sách đổi trả</a></li>
            <li><a href="#" class="hover:text-pink-600">Bảo hành sản phẩm</a></li>
            <li><a href="#" class="hover:text-pink-600">Hướng dẫn mua hàng</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-lg font-bold text-pink-700 mb-3">Về chúng tôi</h3>
            <ul class="space-y-2">
            <li><a href="#" class="hover:text-pink-600">Giới thiệu</a></li>
            <li><a href="#" class="hover:text-pink-600">Tuyển dụng</a></li>
            <li><a href="#" class="hover:text-pink-600">Tin tức</a></li>
            </ul>
        </div>

        <div>
        <h3 class="text-lg font-bold text-pink-700 mb-3">Kết nối với 3TV</h3>
        <p class="text-sm mb-3">Theo dõi chúng tôi để không bỏ lỡ xu hướng thời trang mới nhất mỗi tuần!</p>
        
        <!-- Social icons -->
        <div class="flex space-x-4 text-2xl mt-2">
            <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook-square"></i></a>
            <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-black"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="hover:text-red-600"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Newsletter subscription -->
        <form action="#" method="post" class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Đăng ký nhận tin:</label>
            <div class="flex">
            <input type="email" id="email" name="email" placeholder="Email của bạn"
                class="w-full px-4 py-2 rounded-l-full focus:outline-none focus:ring-2 focus:ring-pink-400 border border-gray-300">
            <button type="submit"
                class="bg-pink-600 text-white px-4 rounded-r-full hover:bg-pink-700 transition">Gửi</button>
            </div>
        </form>

        <!-- Optional QR code -->
        <!-- <div class="mt-4">
            <img src="./img/zalo-qr.png" alt="Zalo QR" class="w-24 rounded-lg border mx-auto">
            <p class="text-xs text-center mt-1">Zalo Official</p>
        </div> -->
        </div>

        </div>

        <!-- Section 3: Copyright -->
        <div class="border-t border-pink-300 pt-6 text-center text-gray-600 text-sm">
        © <?= date('Y') ?> <strong>3TVShop.vn</strong> — Thiết kế bởi Nhóm 3TV
        </div>
    </div>
</footer>

<?php if (!empty($_SESSION['success_message'])): ?>
<script>
    Swal.fire({
        title: "Thành công!",
        text: "<?= $_SESSION['success_message'] ?>",
        icon: "success",
        confirmButtonText: "OK"
    });
</script>
<?php unset($_SESSION['success_message']); endif; ?>

<?php if (!empty($_SESSION['error_message'])): ?>
<script>
    Swal.fire({
        title: "Lỗi!",
        text: "<?= $_SESSION['error_message'] ?>",
        icon: "error",
        confirmButtonText: "Đóng"
    });
</script>
<?php unset($_SESSION['error_message']); endif; ?>

<?php if (!empty($_SESSION['warning_message'])): ?>
<script>
    Swal.fire({
        title: "Cảnh báo!",
        text: "<?= $_SESSION['warning_message'] ?>",
        icon: "warning"
    });
</script>
<?php unset($_SESSION['warning_message']); endif; ?>
