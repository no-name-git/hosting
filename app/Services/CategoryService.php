<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\AttributeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    public function __construct(
        private CategoryRepository $categoryRepository,
        private ProductRepository  $productRepository,
        private AttributeRepository $attributeValueRepository
    )
    {
    }


    public function getCategory(int $perPage = 20): LengthAwarePaginator
    {
        return $this->categoryRepository->getList($perPage);
    }

    public function showCategory(int $id): Category
    {
        $category = $this->categoryRepository->getFind($id);
        $category->products_count = $category->products()->count();
        $category->products_list = $this->productRepository->getByCategory($id);
        return $category;
    }

    public function createCategory(array $data): Category #: Category это то что мы можем вернуть
    {
        DB::beginTransaction();
        try {
            if (isset($data['attributes'])) {
                $attributesData = $data['attributes'];
                unset($data['attributes']);
            }
            $category = $this->categoryRepository->create($data);
            $attribute = $this->attributeValueRepository->create($attributesData);
            $category->attributes()->attach($attribute->id);
            DB::commit();
            return $category;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
    }
    }

    public function updateCategory(array $data, int $id): Category
    {
        return $this->categoryRepository->update($data, $id);
    }

    public function deleteCategory(int $id): bool
    {
        $category = $this->categoryRepository->getFind($id);
        $count = $category->products()->count();
        if ($count > 0)
        {
            throw new \Exception('Нельзя удалить категорию с товарами');
        }
            return $this->categoryRepository->delete($id);

    }
}
