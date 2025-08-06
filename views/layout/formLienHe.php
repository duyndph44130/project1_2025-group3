<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

<div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
    <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">📩 Liên hệ với chúng tôi</h2>

    <form action="<?= BASE_URL . '?act=lien-he-submit' ?>" method="post" class="space-y-5">
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Họ tên</label>
            <input type="text" name="ten" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm" required>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm" required>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Tiêu đề</label>
            <input type="text" name="tieu_de" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm" required>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Nội dung</label>
            <textarea name="noi_dung" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm resize-none" required></textarea>
        </div>

        <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition-all shadow-md">
            Gửi liên hệ
        </button>
    </form>
</div>

<?php require_once 'footer.php'; ?>
