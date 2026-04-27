<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;


/**
 * в репозитории я пишу обращения в бд
 * отсюда я могу получить данные и отправить данные
 *
 * а вот в сервисах я управляю этими данными
 * обновить
 * создать
 * удалить
 */



class ProductRepository
{

    #ищем продукт по айдишнику
    public function findById(int $id): ?Product #получает айдишник как число и если находит то возвращяет продукт , если нет то ничего не вернет
    {
        return Product::query() #вернет отбащение к бд через модельку и начинаем поиск
        ->with(['category', 'productImages']) #пойди в базу и захвати с собой данные из категорий и картинок
        ->find($id); #искать будешь по этому айдишнику
    }

    #запрос на выгрузку для админки с дефолтным значением 20 штук, если больше придет то пагинация будет больше
    public function findAdminList(int $perPage = 20) : LengthAwarePaginator #вернеть с разбивкой по страницам
    {
        return Product::query()
        ->with('category:id,title') #возьми из категории только айди и заголовок
        ->select(['id', 'title', 'price', 'is_published', 'category_id', 'created_at']) #выгрузи только эти поля
        ->latest('id') #сортировка где сначала новые
        ->paginate($perPage); #пагинация из аргумента
    }

    #здесь мы вызываем все товары либо товары с определенной категорией
    public function findCatalogList(?int $category_id, int $perPage = 24): LengthAwarePaginator #у нас может не прийти категория и тогда отобразим все товары или наоборот отобразим товары определенной категории
    {
        return Product::query()
        ->with('category:id,title', 'productImages:id,product_id,file_path, is_active') #тут мы берем поля которые нам нужны
        ->where('is_published', true) #только активные товары
        ->when($category_id, fn ($q) => $q->where('category_id', $category_id))
        #whem это как обычное if просто сокращенное и мы получаем следующее
        #если $category_id равен true то выполни функцию где мы берем товары которые соответствуют условию
        #а если false то ничего не делай и просто отобразятся все товары

        ->latest('id')
        ->paginate($perPage);
    }

    #получение популярных товаров с лимитом в 9 штук
    public function findHitProducts(int $limit = 9): Collection
    {
        return Product::query()
        ->with(['category:id,title', 'productImages:id,product_id,file_path,is_active'])
        ->where('hit_sale', true)
        ->where('is_published', true)
        ->latest('id')
        ->limit($limit)
        ->get();
    }

    #вернет товары по категории
    public function getByCategory(int $id, $perPage = 15): LengthAwarePaginator
    {
        return Product::where('category_id', $id)->paginate($perPage);
    }

    public function search(string $query, int $perPage = 20): LengthAwarePaginator
    {
        return Product::select(['id', 'title', 'price', 'is_published'])
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('cooking_method', 'LIKE', "%{$query}%")
            ->paginate($perPage);
    }

    public function create()
    {
                    //        категории
                    //        теги
                    //        цвет
    }
}
