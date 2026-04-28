<?php



namespace App\Services;

use App\Models\ProductImages;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class ProductImageService
{
    public function __construct(
      private ProductRepository $productRepository,
    ){}


    public function create():array
    {
        return [
            'categoryForProduct' => $this->categoryRepository->getForProduct(),
            'tagForProduct' => $this->tagRepository->getForProduct(),
            'colorForProduct' => $this->colorRepository->getForProduct(),
        ];
    }

    public function store(array $images)
    {
        ProductImages::where('product_id', $this->productRepository->getFint())->count();
        $file_path = Storage::disk('public')->put('images', $images);
        ProductImages::create([
            'file_path' => $file_path,
            'product_id' => $product->id,
            'is_active' => 1,
        ]);
    }
}
