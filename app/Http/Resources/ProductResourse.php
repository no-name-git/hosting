<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'desctiption' => $this->desctiption,
            'structure' => $this->structure,
            'cooking_method' => $this->cooking_method,
            'price' => $this->price,
            'calories' => $this->calories,
            'category_title' => $this->category->title,
            'image_url' => $this->productImages->imageUrl,
        ];
    }
}
