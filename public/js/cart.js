// Глобальные переменные для корзины
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let currentProduct = null;
let modalQuantity = 1;

// DOM элементы корзины
let cartBadge, cartSidebar, closeCartBtn, cartProducts, emptyCart, cartTotal, checkoutBtn;

// Инициализация корзины
function initCart() {
    cartBadge = document.getElementById('cartBadge');
    cartSidebar = document.getElementById('cartSidebar');
    closeCartBtn = document.getElementById('closeCartBtn');
    cartProducts = document.getElementById('cartProducts');
    emptyCart = document.getElementById('emptyCart');
    cartTotal = document.getElementById('cartTotal');
    checkoutBtn = document.getElementById('checkoutBtn');
    
    if (closeCartBtn) {
        closeCartBtn.addEventListener('click', closeCart);
    }
    
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', checkout);
    }
    
    updateCartUI();
}

// Обновление интерфейса корзины
function updateCartUI() {
    if (!cartBadge) return;
    
    // Обновляем счетчик
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    cartBadge.textContent = totalItems;
    
    // Обновляем содержимое корзины (если есть элементы)
    if (cartProducts && emptyCart && cartTotal && checkoutBtn) {
        if (cart.length === 0) {
            emptyCart.style.display = 'block';
            cartProducts.innerHTML = '';
            cartTotal.textContent = '0 ₽';
            checkoutBtn.disabled = true;
            checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            emptyCart.style.display = 'none';
            
            let html = '';
            let total = 0;
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                html += `
                    <div class="flex items-center border-b pb-4 mb-4">
                        <div class="w-16 h-16 overflow-hidden rounded-lg mr-4 flex-shrink-0">
                            <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-semibold text-gray-800">${item.name}</h4>
                            <p class="text-gray-600 text-sm">${item.price} ₽ × ${item.quantity}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-gray-800">${itemTotal} ₽</p>
                            <button class="remove-from-cart-btn text-red-500 text-sm mt-1 hover:text-red-700" 
                                    data-index="${index}">
                                Удалить
                            </button>
                        </div>
                    </div>
                `;
            });
            
            cartProducts.innerHTML = html;
            cartTotal.textContent = total + ' ₽';
            checkoutBtn.disabled = false;
            checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            
            // Добавляем обработчики для кнопок удаления
            document.querySelectorAll('.remove-from-cart-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    removeFromCart(index);
                });
            });
        }
    }
}

// Добавить товар в корзину
function addToCart(productId, quantity) {
    const product = getProductById(productId);
    
    if (!product) return;
    
    // Проверяем, есть ли товар уже в корзине
    const existingItemIndex = cart.findIndex(item => item.id === productId);
    
    if (existingItemIndex !== -1) {
        // Увеличиваем количество
        cart[existingItemIndex].quantity += quantity;
    } else {
        // Добавляем новый товар
        cart.push({
            id: product.id,
            name: product.name,
            price: product.price,
            quantity: quantity,
            image: product.image
        });
    }
    
    // Сохраняем в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Обновляем интерфейс
    updateCartUI();
}

// Удалить товар из корзины
function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
    showNotification('Товар удален из корзины', 'error');
}

// Открыть корзину
function openCart() {
    if (cartSidebar) {
        cartSidebar.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

// Закрыть корзину
function closeCart() {
    if (cartSidebar) {
        cartSidebar.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Оформление заказа
function checkout() {
    if (cart.length === 0) return;
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    
    showNotification(`Заказ оформлен! Сумма: ${total} ₽`, 'success');
    
    // Очищаем корзину
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
    closeCart();
}

// Анимация кнопки корзины
function animateCartButton() {
    const cartBtn = document.getElementById('cartBtn');
    if (cartBtn) {
        cartBtn.classList.add('cart-pulse');
        setTimeout(() => {
            cartBtn.classList.remove('cart-pulse');
        }, 2000);
    }
}