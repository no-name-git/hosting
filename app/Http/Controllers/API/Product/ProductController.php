<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    // GET /api/products - каталог товаров
    public function index()
    {
        $products = $this->productService->getAll();
        return ProductResource::collection($products);
    }


}
