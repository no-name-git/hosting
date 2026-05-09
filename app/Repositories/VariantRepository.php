<?php

namespace App\Repositories;

use App\Models\ProductVariant;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;




class VariantRepository
{

    public function create(array $data): ProductVariant
    {
        return ProductVariant::create($data);
    }

    public function edit(array $data): ProductVariant
    {
        $variantProduct = ProductVariant::where('product_id', $data['product_id'])
            ->where('sku', $data['sku'])
            ->first();
        if (!$variantProduct){
            $variantProduct = ProductVariant::create($data);
            return $variantProduct->fresh();
        }
        unset($data['product_id']);
        unset($data['sku']);
        $variantProduct->update($data);

        return $variantProduct->fresh();
    }

    public function createImages(ProductVariant $variant, array $images): void
    {

        foreach ($images as $index => $image){
            // Создаем уникальное имя файла
            $filename = "variant_{$variant->id}_{$index}_" . time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('variants_images', $filename, 'public');

            if ($index === 0) {
                $variant->images()->create([
                    'file_path' => $path,
                    'is_main' => 1
                ]);
            } else {
                $variant->images()->create([
                    'file_path' => $path,
                    'is_main' => 0
                ]);
            }
        }
    }

}
