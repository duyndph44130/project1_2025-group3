<header class="bg-gradient-to-r from-pink-400 via-pink-500 to-purple-500 text-white shadow-lg sticky top-0 z-50">
  <div class="container mx-auto px-4 flex flex-wrap items-center justify-between py-3">

    <!-- Logo -->
    <div class="flex items-center space-x-3">
      <a href="<?= BASE_URL . '?act=/' ?>">      
        <img src="./img/logo3TV.jpg" alt="Logo" class="w-16 h-16 object-contain rounded-full border-2 border-white">
      </a>
      <a href="<?= BASE_URL . '?act=/' ?>" class="text-3xl font-extrabold tracking-widest uppercase hover:text-yellow-300">3TV</a>
    </div>

    <!-- Navigation Links -->
    <nav class="hidden md:flex space-x-8 text-lg font-medium">
      <a href="<?= BASE_URL . '?act=/' ?>" class="hover:text-yellow-300 transition">Trang Chủ</a>
      <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="hover:text-yellow-300 transition">Sản Phẩm</a>
      <a href="<?= BASE_URL . '?act=gioi-thieu' ?>" class="hover:text-yellow-300 transition">Giới thiệu</a>
      <a href="<?= BASE_URL . '?act=lien-he' ?>" class="hover:text-yellow-300 transition">Liên hệ</a>
    </nav>

    <!-- Tìm kiếm + Tài khoản + Giỏ hàng -->
    <div class="flex items-center space-x-4 mt-4 md:mt-0">
      <!-- Search -->
      <form action="?act=search" method="post" class="relative w-64">
        <input type="text" name="search"
                placeholder="Tìm sản phẩm..."
                class="w-full px-4 py-2 rounded-full text-gray-700 focus:ring-2 focus:ring-yellow-400 outline-none placeholder-gray-400">
        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-yellow-500">
          <i class="fas fa-search"></i>
        </button>
      </form>

      <!-- Số điện thoại -->
      <div class="hidden lg:flex items-center space-x-1">
        <i class="fas fa-phone-alt text-xl"></i>
        <span class="font-semibold">0352614404</span>
      </div>

      <!-- Tài khoản -->
      <div class="relative group">
        <a href="?act=chi-tiet-tai-khoan-client" class="text-white hover:text-yellow-300 text-2xl">
          <i class="far fa-user"></i>
        </a>
        <div class="absolute right-0 w-52 mt-2 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-50">
          <?php if (isset($_SESSION['user_client'])): ?>
            <ul class="py-2">
              <li><a href="?act=chi-tiet-tai-khoan-client" class="block px-4 py-2 hover:bg-pink-100">Tài khoản</a></li>
              <li><a href="?act=lich-su-mua-hang" class="block px-4 py-2 hover:bg-pink-100">Đơn mua</a></li>
              <li><a href="?act=log-out-client" class="block px-4 py-2 hover:bg-pink-100">Đăng xuất</a></li>
            </ul>
          <?php else: ?>
            <a href="?act=form-dang-nhap-client" class="block px-4 py-2 hover:bg-pink-100">Đăng nhập</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Giỏ hàng -->
      <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="relative text-white hover:text-yellow-300 text-2xl">
        <i class="fas fa-shopping-cart"></i>
      </a>
    </div>
  </div>
</header>
