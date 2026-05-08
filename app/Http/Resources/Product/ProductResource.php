<?php

namespace App\Http\Resources\Product;

use App\Repositories\ProductVariantRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,

            // Категория
            'category' => [
                'id' => $this->category->id ?? null,
                'title' => $this->category->title ?? null,
            ],

            // Варианты товара (размеры, цвета и т.д.)
            'variants' => ProductVariantResource::collection($this->variants),

            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
