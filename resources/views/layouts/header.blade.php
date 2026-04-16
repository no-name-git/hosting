<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя Кухня | Готовая еда с доставкой</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Наши стили -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
<!-- Навигация -->
<nav class="bg-white shadow-md sticky top-0 z-30">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Логотип -->
            <div class="flex items-center">
                <i class="fas fa-utensils text-red-500 text-2xl mr-2"></i>
                <a href="{{route('index.index')}}" class="text-xl font-bold text-gray-800">Вкусно как дома</a>
            </div>

            <!-- Основное меню -->
            <div class="hidden md:flex space-x-8">
                <a href="{{route('index.index')}}" class="text-red-500 font-semibold">Главная</a>
                <a href="{{route('index.catalog')}}" class="text-gray-700 hover:text-red-500">Каталог</a>
                <a href="{{route('index.about')}}" class="text-gray-700 hover:text-red-500">О нас</a>
            </div>

            <!-- Корзина и мобильное меню -->
            <div class="flex items-center">
                <!-- Корзина -->
                <a href="catalog.blade.php#cart" class="relative mr-6">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                    <div class="cart-badge" id="cartBadge">0</div>
                </a>

                <!-- Мобильное меню -->
                <button id="mobileMenuBtn" class="md:hidden">
                    <i class="fas fa-bars text-gray-700 text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Мобильное меню -->
        <div id="mobileMenu" class="hidden md:hidden py-4 border-t">
            <div class="flex flex-col space-y-4">
                <a href="{{route('index.index')}}" class="text-red-500 font-semibold">Главная</a>
                <a href="{{route('index.catalog')}}" class="text-gray-700 hover:text-red-500">Каталог</a>
                <a href="{{route('index.about')}}" class="text-gray-700 hover:text-red-500">О нас</a>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- Подвал -->
<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Логотип и описание -->
            <div class="mb-6 md:mb-0">
                <div class="flex items-center mb-3">
                    <i class="fas fa-utensils text-red-400 text-2xl mr-2"></i>
                    <h2 class="text-xl font-bold">Домашняя Кухня</h2>
                </div>
                <p class="text-gray-400">Готовая еда как дома © 2023</p>
            </div>

            <!-- Меню в подвале -->
            <div class="flex space-x-6">
                <a href="{{route('index.index')}}" class="text-gray-300 hover:text-white">Главная</a>
                <a href="{{route('index.catalog')}}" class="text-gray-300 hover:text-white">Каталог</a>
                <a href="{{route('index.about')}}" class="text-gray-300 hover:text-white">О нас</a>
            </div>
        </div>
    </div>
</footer>

<!-- Модальное окно товара (общее для всех страниц) -->
<div class="modal" id="productModal">
    <div class="modal-content">
        <div class="p-6">
            <!-- Заголовок -->
            <div class="flex justify-between items-start mb-6">
                <h2 id="modalProductName" class="text-2xl font-bold text-gray-800" data-id=""></h2>
                <button id="closeModalBtn">
                    <i class="fas fa-times text-gray-500 text-xl hover:text-gray-700"></i>
                </button>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- Изображение -->
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <img id="modalProductImage" src="" alt="" class="w-full h-64 md:h-80 object-cover rounded-xl">
                </div>

                <!-- Информация -->
                <div class="md:w-1/2 md:pl-6">
                    <p id="modalProductDescription" class="text-gray-600 mb-4"></p>

                    <div class="mb-4">
                        <span class="font-semibold">Категория:</span>
                        <span id="modalProductCategory" class="ml-2 bg-red-100 text-red-800 text-sm px-2 py-1 rounded"></span>
                    </div>

                    <div class="mb-4">
                        <span class="font-semibold">Способ приготовления:</span>
                        <span id="modalProductMethod" class="ml-2"></span>
                    </div>

                    <div class="mb-4">
                        <span class="font-semibold">Калорийность:</span>
                        <span id="modalProductCalories" class="ml-2"></span>
                    </div>
                    <div class="mb-4">
                        <span class="font-semibold">Состав:</span>
                        <span id="modalProductStructure" class="ml-2"></span>
                    </div>

                    <!-- Цена и количество -->
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <span id="modalProductPrice" class="text-2xl font-bold text-gray-800"></span>
                            <span class="text-gray-500"> / порция</span>
                        </div>

                        <div class="flex items-center">
                            <button id="modalDecreaseBtn" class="bg-gray-200 text-gray-700 w-8 h-8 rounded-l-lg hover:bg-gray-300">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span id="modalProductQuantity" class="bg-gray-100 w-10 h-8 flex items-center justify-center">1</span>
                            <button id="modalIncreaseBtn" class="bg-gray-200 text-gray-700 w-8 h-8 rounded-r-lg hover:bg-gray-300">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Кнопка добавления в корзину -->
                    <button id="modalAddToCartBtn" class="w-full bg-red-500 text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-200">
                        Добавить в корзину
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Подключаем JavaScript -->
<script src="{{asset('js/products.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/ui.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<script>
    // Инициализация для главной страницы
    document.addEventListener('DOMContentLoaded', function() {
        // Инициализируем общие компоненты

        // Загружаем популярные товары
        // loadPopularProducts();
    });
</script>
</body>
</html>

