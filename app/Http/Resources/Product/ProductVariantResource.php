<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'price' => (float) $this->price,
            'old_price' => $this->old_price ? (float) $this->old_price : null,
            'discount' => $this->discount,
            'count' => $this->count,
            'is_active' => (bool) $this->is_active,
            'in_stock' => $this->count > 0,
            'image_url' => $this->images->map(function ($image){
                    return [
                        'id' => $image->id,
                        'image_url' => $image->imageUrl,
                        'is_main' => $image->is_main
                    ];
            }),

            // Атрибуты варианта (Размер: M, Цвет: Черный)
            'attributes' => $this->attributeValues->map(function($value) {
                    return [
                        'attribute_name' => $value->attribute->name,
                        'attribute_slug' => $value->attribute->slug,
                        'value' => $value->value,
                        'slug' => $value->slug,
                        'color_hex' => $value->color_hex,
                    ];
            }),
        ];
    }
}
