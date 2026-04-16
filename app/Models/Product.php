<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    protected $with = ['productImages'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
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

}
