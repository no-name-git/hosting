// Инициализация общих компонентов
function initCommonComponents() {
    // Инициализируем корзину
    initCart();
    
    // Инициализируем модальное окно
    initModal();
    
    // Инициализируем мобильное меню
    initMobileMenu();
    
    // Настраиваем кнопку корзины
    const cartBtn = document.getElementById('cartBtn');
    if (cartBtn) {
        cartBtn.addEventListener('click', openCart);
    }
    
    // Настраиваем закрытие корзины при клике на фон
    const cartSidebar = document.getElementById('cartSidebar');
    if (cartSidebar) {
        cartSidebar.addEventListener('click', function(e) {
            if (e.target === this) closeCart();
        });
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Обновляем счетчик корзины на всех страницах
    const cartBadge = document.getElementById('cartBadge');
    if (cartBadge) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartBadge.textContent = totalItems;
    }
});