    // ===== main.js cho phần client =====

    // Mở / đóng giỏ hàng
    const cartToggle = document.querySelector('#cart-toggle');
    const cartPanel = document.querySelector('.cart');

    if (cartToggle && cartPanel) {
    cartToggle.addEventListener('click', () => {
        cartPanel.classList.toggle('active');
    });
    }

    // Xử lý tăng / giảm số lượng sản phẩm
    document.querySelectorAll('.quantity-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const input = e.target.closest('.quantity-control').querySelector('input');
        let value = parseInt(input.value);
        if (e.target.classList.contains('plus')) {
        input.value = value + 1;
        } else if (e.target.classList.contains('minus') && value > 1) {
        input.value = value - 1;
        }
    });
    });
