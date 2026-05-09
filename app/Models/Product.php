<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;


public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function getPublishedAttribute()
    {
        return match($this->is_published)
        {
            '0', 0 => 'Не опубликовано',
            '1', 1 => 'Опубликовано',
        };
    }

    public function getSaleAttribute()
    {
        return match($this->hit_sale){
            0, '0' => 'Не хит продаж',
            1, '1' => 'Хит продаж',
        };
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    // Связь с вариантами товара (один товар -> много вариантов)
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
