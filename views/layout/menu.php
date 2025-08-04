<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<header class="bg-blue-500 text-white shadow-md">
  <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center py-4">
    <div class="flex items-center space-x-3">
      <img src="./img/logo.png" alt="Logo" class="w-20 h-20">
      <a href="<?= BASE_URL ?>">
        <h1 class="text-4xl font-bold tracking-wide">TRENDING</h1>
      </a>
    </div>

    <nav class="hidden md:flex space-x-8 mt-4 md:mt-0 text-lg">
      <a href="<?= BASE_URL ?>" class="text-white hover:text-green-200 transition">Trang Chủ</a>
      <a href="<?= BASE_URL . '?act=gioi-thieu' ?>" class="text-white hover:text-green-200 transition">Giới thiệu</a>
      <a href="<?= BASE_URL . '?act=lien-he' ?>" class="text-white hover:text-green-200 transition">Liên hệ</a>
    </nav>

    <div class="flex items-center space-x-6 mt-4 md:mt-0">
      <div class="relative">
        <form action="?act=search" method="post">
          <input
            type="text"
            placeholder="Tìm sản phẩm yêu thích..."
            class="px-5 py-3 w-80 md:w-96 rounded-full text-gray-700 focus:ring-2 focus:ring-green-400 focus:outline-none placeholder-gray-500"
            name="search">
          <button
            class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-green-500">
            🔍
          </button>
        </form>
      </div>

      <div class="flex items-center space-x-2">
        <span class="text-2xl font-bold">📞</span>
        <span class="text-xl font-semibold tracking-wide">0352614404</span>
      </div>
    </div>

    <div class="relative group">
      <a href="?act=chi-tiet-tai-khoan-client" class="text-white flex items-center space-x-2 hover:text-green-200">
        <i class="fa-regular fa-user text-2xl"></i>
      </a>
      <div class="absolute left-0 w-48 bg-white text-gray-800 mt-2 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity ease-out duration-300 z-50">
        <?php if (isset($_SESSION['user_client'])): ?>
          <ul>
            <li><a href="?act=chi-tiet-tai-khoan-client" class="block px-4 py-2 hover:bg-gray-100 transition">Chi tiết tài khoản</a></li>
            <li><a href="?act=lich-su-mua-hang" class="block px-4 py-2 hover:bg-gray-100 transition">Đơn mua</a></li>
            <li><a href="?act=log-out-client" class="block px-4 py-2 hover:bg-gray-100 transition">Logout</a></li>
          </ul>
        <?php else: ?>
          <a class="dropdown-item" href='?act=form-dang-nhap-client'>
            <span class="align-middle" data-key="t-login">Login</span>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="text-white relative">
      <i class="fa-solid fa-shopping-bag text-2xl"></i>
    </a>
  </div>
</header>