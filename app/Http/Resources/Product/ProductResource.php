<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'price' => $this->price,
            'oldPrice' => $this->oldPrice,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'hit_sale' => $this->hit_sale,
            'category' => new CategoryResource($this->category),
//            'image_url'=> $this->productImages->test,






        ];
    }
}
