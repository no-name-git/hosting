<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function getList(int $perPage = 20): LengthAwarePaginator
    {
        return Category::paginate($perPage);
    }

    public function getForProduct()
    {
        return Category::select('id', 'title')->get();
    }

    public function getFind($id): ?Category
    {
        return Category::find($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update($data, $id): Category
    {
        $category = $this->getFind($id);
        $category->update($data);
        return $category->fresh();
    }

    public function delete($id): bool
    {
        return Category::destroy($id);
    }

    public function search(string $query, int $perPage = 20): LengthAwarePaginator
    {
        return Category::select('id',   'title')
            ->where('title', 'LIKE', "%{$query}%" )
            ->paginate($perPage);
    }
}
