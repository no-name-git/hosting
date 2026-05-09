<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchService
{

    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
    )
    {
    }

    public function search(string $query, int $perPage = 20)
    {
        $category = $this->categoryRepository->search($query, $perPage);
        $product = $this->productRepository->search($query, $perPage);

        return [
            'category' => $category,
            'product' => $product,
            'total' => $category->total() + $product->total(),
            'query' => $query
        ];
    }
}
