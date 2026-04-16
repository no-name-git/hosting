@extends('layouts.header')


@section('content')
<!-- Герой секция -->
<section class="bg-gradient-to-r from-red-50 to-orange-50 py-12 md:py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Готовая еда <span class="text-red-500">как дома</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8">
                    Свежеприготовленные блюда из натуральных продуктов с доставкой до вашей двери.
                    Вкусно, полезно и удобно!
                </p>
                <a href="{{route('index.catalog')}}" class="inline-block bg-red-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-200">
                    Смотреть каталог
                </a>
            </div>
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                     alt="Готовая еда" class="rounded-2xl shadow-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Преимущества -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Почему выбирают нас</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Преимущество 1 -->
            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-leaf text-red-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Свежие продукты</h3>
                <p class="text-gray-600">Используем только свежие, натуральные продукты без консервантов</p>
            </div>

            <!-- Преимущество 2 -->
            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-red-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Быстрая доставка</h3>
                <p class="text-gray-600">Доставляем заказы в течение часа после приготовления</p>
            </div>

            <!-- Преимущество 3 -->
            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <!-- <i class="fas fa-chef-hat text-red-500 text-2xl"></i> -->
                    <svg style="width: 24px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25285 4.25547C8.09403 2.47951 9.90263 1.25 12 1.25C14.0974 1.25 15.906 2.47951 16.7471 4.25547C16.831 4.25184 16.9153 4.25 17 4.25C20.1756 4.25 22.75 6.82436 22.75 10C22.75 12.1806 21.5363 14.0762 19.75 15.0508L19.75 18.052C19.75 18.9505 19.7501 19.6997 19.6701 20.2945C19.5857 20.9223 19.4 21.4891 18.9445 21.9445C18.4891 22.4 17.9223 22.5857 17.2945 22.6701C16.6997 22.7501 15.9505 22.75 15.052 22.75H8.94801C8.04952 22.75 7.3003 22.7501 6.70552 22.6701C6.07773 22.5857 5.51093 22.4 5.05546 21.9445C4.59999 21.4891 4.41432 20.9223 4.32991 20.2945C4.24994 19.6997 4.24997 18.9505 4.25 18.052L4.25 15.0508C2.46371 14.0762 1.25 12.1806 1.25 10C1.25 6.82436 3.82436 4.25 7 4.25C7.08469 4.25 7.16899 4.25184 7.25285 4.25547ZM6.80262 5.7545C4.54704 5.85762 2.75 7.71895 2.75 10C2.75 11.7416 3.79769 13.2402 5.30028 13.8967C5.57345 14.016 5.75 14.2859 5.75 14.584V17.25H18.25L18.25 14.584C18.25 14.2859 18.4265 14.016 18.6997 13.8967C20.2023 13.2402 21.25 11.7416 21.25 10C21.25 7.71895 19.453 5.85761 17.1974 5.7545C17.2321 5.99825 17.25 6.24718 17.25 6.5V7C17.25 7.41421 16.9142 7.75 16.5 7.75C16.0858 7.75 15.75 7.41421 15.75 7V6.5C15.75 6.07715 15.6803 5.67212 15.5524 5.29486C15.0502 3.81402 13.6484 2.75 12 2.75C10.3516 2.75 8.94981 3.81402 8.44763 5.29486C8.3197 5.67212 8.25 6.07715 8.25 6.5V7C8.25 7.41421 7.91421 7.75 7.5 7.75C7.08579 7.75 6.75 7.41421 6.75 7V6.5C6.75 6.24717 6.76792 5.99825 6.80262 5.7545ZM18.2482 18.75H5.75181C5.75604 19.3194 5.77008 19.7491 5.81654 20.0946C5.87858 20.5561 5.9858 20.7536 6.11612 20.8839C6.24643 21.0142 6.44393 21.1214 6.90539 21.1835C7.38843 21.2484 8.03599 21.25 9 21.25H15C15.964 21.25 16.6116 21.2484 17.0946 21.1835C17.5561 21.1214 17.7536 21.0142 17.8839 20.8839C18.0142 20.7536 18.1214 20.5561 18.1835 20.0946C18.2299 19.7491 18.244 19.3194 18.2482 18.75Z" fill="rgb(239 68 68)"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Опытные повара</h3>
                <p class="text-gray-600">Наши повара с многолетним опытом готовят как для своей семьи</p>
            </div>
        </div>
    </div>
</section>

<!-- Популярные блюда -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Популярные блюда</h2>
        <p class="text-center text-gray-600 mb-12">То, что заказывают чаще всего</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="popularProducts">
                @foreach($hit_products as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden food-card">
                    <div class="h-48 overflow-hidden">
                        <img src="{{$product->productImages->first()->imageUrl}}" alt="{{$product->title}}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg text-gray-800">{{$product->title}}</h3>
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">{{$product->category->title}}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{Str::limit($product->description, 80)}}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">{{$product->price}} ₽</span>
                            <button class="view-product-btn bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600 transition duration-200"
                                    data-id="{{ $product->id }}"
                                    data-title="{{ $product->title }}"
                                    data-description="{{ $product->description }}"
                                    data-price="{{ $product->price }}"
                                    data-price="{{ $product->price }}"
{{--                                    data-image="{{ $product->productImages->first()->imageUrl }}"--}}
                                    data-category="{{ $product->category->title }}">
                                Подробнее
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Товары будут добавляться через JavaScript -->
            </div>
        <div class="text-center mt-10">
            <a href="{{route('index.catalog')}}" class="inline-block border-2 border-red-500 text-red-500 px-8 py-3 rounded-lg font-semibold hover:bg-red-500 hover:text-white transition duration-200">
                Весь каталог
            </a>
        </div>
    </div>
</section>
@endsection
