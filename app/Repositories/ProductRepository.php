<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getAll(int $perPage = 20): LengthAwarePaginator
    {
        return Product::paginate($perPage);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function edit($product , array $data): Product
    {
        $product->update($data);
        return $product->fresh();
    }

    public function findById(int $id): ?Product
    {
        return Product::with('variants.attributeValues')->find($id);
    }

    public function getByCategory(int $categoryId, array $filters = [] )
    {
        $query = Product::where('category_id', $categoryId);
        if(isset($filters['attributes'])){
            $query->whereHas('variants.attributeValues', function ($q) use ($filters){
                $q->whereIn('attribute_value_id', $filters['attributes']);
            });
        }
        return $query->paginate(20);
    }

    public function update(int $id, array $data): bool
    {
        return Product::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id);
    }
}
