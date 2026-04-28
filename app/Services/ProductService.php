<?php


namespace App\Services;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;
use App\Repositories\ProductImageRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
      private CategoryRepository $categoryRepository,
      private TagRepository $tagRepository,
      private ColorRepository $colorRepository,
      private ProductImageRepository $productImageRepository,
      private ProductRepository $productRepository,
    ){}

    public function getFint(int $id)
    {
        return $this->productRepository->getFind($id);
    }


    public function create():array
    {
        return [
            'categoryForProduct' => $this->categoryRepository->getForProduct(),
            'tagForProduct' => $this->tagRepository->getForProduct(),
            'colorForProduct' => $this->colorRepository->getForProduct(),
        ];
    }

    public function store(array $data)
    {
        $images = $data['images'];
        $this->productImageRepository->store($images);


        unset($data['images']);


    }
}
