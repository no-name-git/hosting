<?php


namespace App\Services;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Repositories\TagRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\VariantRepository;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Ramsey\Collection\Collection;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function __construct(
      private CategoryRepository $categoryRepository,
      private TagRepository $tagRepository,
      private ColorRepository $colorRepository,
      private ProductRepository $productRepository,
      private ProductVariantRepository $productVariantRepository,
      private VariantRepository $variantRepository
    ){}


    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getById(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    public function create():array
    {
        return [
            'categoryForProduct' => $this->categoryRepository->getForProduct(),
            'tagForProduct' => $this->tagRepository->getForProduct(),
            'colorForProduct' => $this->colorRepository->getForProduct(),
        ];
    }


    public function store(array $data): Product
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'slug' => Str::slug($data['title']),
                'category_id' => $data['category_id']
            ]);


            foreach ($data['variants'] as $variantData) {
                $variant = $this->variantRepository->create([
                    'product_id' => $product->id,
                    'sku' => $variantData['sku'],
                    'price' => $variantData['price'],
                    'old_price' => $variantData['old_price'] ?? null,
                    'count' => $variantData['count'],

                ]);
                $variant->attributeValues()->attach($variantData['attribute_values']);
                if (!empty($variantData['images'])){
                    $this->variantRepository->createImages($variant, $variantData['images']);
                }
            }
        DB::commit();
        return $product->load('variants.attributeValues');
        } catch (\Exception $e){
        DB::rollBack();
        throw $e;
    }
    }

    public function update(array $data, int $id): Product
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->findById($id);
            if (!$product) {
                throw new \Exception('Товар не найден');
            }

            $this->productRepository->edit($product , [
                'title' => $data['title'],
                'description' => $data['description'],
                'slug' => Str::slug($data['title']),
                'category_id' => $data['category_id']
            ]);

            if (isset($data['images']) && !empty($data['images'])) {
                // Удаляем старые изображения
                foreach ($product->productImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage->file_path);
                    $oldImage->delete();
                }

                // Добавляем новые изображения
                foreach ($data['images'] as $index => $image) {
                    $path = $image->store('products', 'public');
                    $product->productImages()->create([
                        'file_path' => $path,
                        'is_main' => $index === 0,
                    ]);
                }
            }
//
            foreach ($data['variants'] as $variantData) {
                $variant = $this->variantRepository->edit([
                    'product_id' => $product->id,
                    'sku' => $variantData['sku'],
                    'price' => $variantData['price'],
                    'old_price' => $variantData['old_price'],
                    'count' => $variantData['count']

                ]);
                $variant->attributeValues()->sync($variantData['attribute_values']);
            }
            DB::commit();
            return $product->load('variants.attributeValues', 'productImages');
        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
