@extends('layouts.header')

@section('content')

<!-- Сайдбар корзины -->
    <div class="sidebar" id="cartSidebar">
        <div class="h-full flex flex-col">
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-bold text-gray-800">Корзина</h2>
                <button id="closeCartBtn">
                    <i class="fas fa-times text-gray-500 text-xl hover:text-gray-700"></i>
                </button>
            </div>

            <div class="flex-grow overflow-y-auto p-6" id="cartItems">
                <div id="emptyCart" class="text-center py-10">
                    <i class="fas fa-shopping-cart text-gray-300 text-5xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Ваша корзина пуста</p>
                    <p class="text-gray-400 text-sm mt-2">Добавьте что-нибудь из каталога</p>
                </div>

                <div id="cartProducts" class="space-y-4"></div>
            </div>

            <div class="border-t p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold text-gray-700">Итого:</span>
                    <span id="cartTotal" class="text-2xl font-bold text-gray-800">0 ₽</span>
                </div>
                <button id="checkoutBtn" class="w-full bg-red-500 text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Оформить заказ
                </button>
            </div>
        </div>
    </div>

    <!-- Основной контент каталога -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Каталог блюд</h1>
        <p class="text-gray-600 mb-8">Выберите блюда на свой вкус</p>

        <!-- Фильтры по категориям -->
        <div class="flex flex-wrap gap-3 mb-8" id="categoryFilters">
            <button class="category-btn" data-category="all">Все блюда</button>

            @foreach($categories as $category)
                <button class="category-btn"
                        data-category="{{$category->id}}">
                    {{ $category->title}}
                </button>
            @endforeach
        </div>

        <!-- Каталог товаров -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="catalogProducts">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden food-card catalog-product" data-category="{{$product->category_id}}">
                    <div class="h-48 overflow-hidden">
                        <img src="" alt="{{$product->title}}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg text-gray-800">{{$product->title}}</h3>
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">{{$product->category->title}}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{Str::limit($product->description, 80)}}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">{{$product->price}} ₽</span>
                            <div class="flex space-x-2">
                                <button class="view-product-btn"
                                        data-id="{{ $product->id }}"
                                        data-title="{{ $product->title }}"
                                        data-description="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                        data-cooking_method="{{ $product->cooking_method }}"
                                        data-calories="{{ $product->calories }}"
                                        data-structure="{{ $product->structure }}"
                                        data-image="{{ $product->productImages }}"
                                        data-category="{{ $product->category->title }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="add-to-cart-btn bg-red-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-red-600 transition duration-200"
                                        data-id="{{$product->id}}">
                                <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
