@extends('layouts.header')

@section('content')

    <!-- Основной контент -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">О нас</h1>

        <div class="flex flex-col md:flex-row items-center mb-12">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                     alt="Наша кухня" class="rounded-2xl shadow-lg w-full">
            </div>
            <div class="md:w-1/2 md:pl-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Наша история</h2>
                <p class="text-gray-600 mb-4">
                    "Домашняя Кухня" появилась в 2018 году с простой идеей: дать возможность людям
                    наслаждаться вкусной и здоровой домашней едой, даже когда у них нет времени на готовку.
                </p>
                <p class="text-gray-600 mb-4">
                    Начав с маленькой кухни и нескольких блюд, сегодня мы готовим более 100 позиций меню
                    и доставляем заказы по всему городу.
                </p>
                <p class="text-gray-600">
                    Мы верим, что еда должна быть не только вкусной, но и полезной. Поэтому в наших рецептах
                    только натуральные продукты, а процесс приготовления максимально приближен к домашним условиям.
                </p>
            </div>
        </div>

        <!-- Наши принципы -->
        <div class="bg-red-50 rounded-2xl p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Наши принципы</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Принцип 1 -->
                <div class="flex items-start">
                    <div class="bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 mb-2">Свежесть</h3>
                        <p class="text-gray-600">Готовим в день доставки. Никаких заготовок и длительного хранения.</p>
                    </div>
                </div>

                <!-- Принцип 2 -->
                <div class="flex items-start">
                    <div class="bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 mb-2">Натуральность</h3>
                        <p class="text-gray-600">Только натуральные продукты без консервантов и усилителей вкуса.</p>
                    </div>
                </div>

                <!-- Принцип 3 -->
                <div class="flex items-start">
                    <div class="bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 mb-2">Вкус</h3>
                        <p class="text-gray-600">Наши повара вкладывают душу в каждое блюдо, как для своей семьи.</p>
                    </div>
                </div>

                <!-- Принцип 4 -->
                <div class="flex items-start">
                    <div class="bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 mb-2">Доступность</h3>
                        <p class="text-gray-600">Качественная домашняя еда по цене, доступной каждому.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Контакты -->
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Контакты</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-2xl mx-auto">
                <div class="p-4">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-map-marker-alt text-red-500"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Адрес</h3>
                    <p class="text-gray-600 text-sm">г. Москва, ул. Кулинарная, д. 15</p>
                </div>

                <div class="p-4">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-phone text-red-500"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Телефон</h3>
                    <p class="text-gray-600 text-sm">+7 (495) 123-45-67</p>
                </div>

                <div class="p-4">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-envelope text-red-500"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Email</h3>
                    <p class="text-gray-600 text-sm">info@domashnyakuhnya.ru</p>
                </div>
            </div>
        </div>
    </div>
@endsection
