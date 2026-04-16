// Фильтрация в каталоге
function initCatalogFilters() {
    const buttons = document.querySelectorAll('.category-btn');
    const products = document.querySelectorAll('.catalog-product');

    if (!buttons.length) return;

    function filterProducts(category) {
        products.forEach(product => {
            product.style.display =
                (category === 'all' || product.dataset.category === category)
                    ? 'block'
                    : 'none';
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            buttons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterProducts(this.dataset.category);
        });
    });

    const allBtn = document.querySelector('[data-category="all"]');
    if (allBtn) {
        allBtn.classList.add('active');
        filterProducts('all');
    }
}

// Модальное окно
function initModal() {
    const modal = document.getElementById('productModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const decreaseBtn = document.getElementById('modalDecreaseBtn');
    const increaseBtn = document.getElementById('modalIncreaseBtn');
    const quantityEl = document.getElementById('modalProductQuantity');
    const addToCartBtn = document.getElementById('modalAddToCartBtn');

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });
    }

    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    });

    if (decreaseBtn && quantityEl) {
        decreaseBtn.addEventListener('click', () => {
            let qty = parseInt(quantityEl.textContent);
            if (qty > 1) quantityEl.textContent = qty - 1;
        });
    }

    if (increaseBtn && quantityEl) {
        increaseBtn.addEventListener('click', () => {
            let qty = parseInt(quantityEl.textContent);
            quantityEl.textContent = qty + 1;
        });
    }

    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            const productId = document.getElementById('modalProductName').dataset.productId;
            const quantity = parseInt(quantityEl.textContent);

            // Здесь будет добавление в корзину
            console.log('Добавить в корзину:', productId, 'x', quantity);
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });
    }
}

// Открытие модалки товара
function openProductModal(button) {
    const modal = document.getElementById('productModal');

    document.getElementById('modalProductName').textContent = button.dataset.title;
    document.getElementById('modalProductName').dataset.productId = button.dataset.id;
    document.getElementById('modalProductDescription').textContent = button.dataset.description;
    document.getElementById('modalProductPrice').textContent = button.dataset.price + ' ₽';
    document.getElementById('modalProductCategory').textContent = button.dataset.category;
    document.getElementById('modalProductMethod').textContent = button.dataset.cooking_method;
    document.getElementById('modalProductCalories').textContent = button.dataset.calories;
    document.getElementById('modalProductStructure').textContent = button.dataset.structure;
    document.getElementById('modalProductQuantity').textContent = '1';

    const img = document.getElementById('modalProductImage');
    if (img && button.dataset.image) {
        img.src = button.dataset.image;
        img.alt = button.dataset.title;
    }

    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Инициализация
document.addEventListener('DOMContentLoaded', function() {
    // Фильтры в каталоге
    if (document.getElementById('catalogProducts')) {
        initCatalogFilters();
    }

    // Модалка
    initModal();

    // Обработчики кнопок просмотра
    document.addEventListener('click', function(e) {
        const viewBtn = e.target.closest('.view-product-btn');
        if (viewBtn) {
            e.preventDefault();
            openProductModal(viewBtn);
        }
    });
});
