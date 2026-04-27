<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'colors';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_product');
    }

    public function getCountProduct() :int
    {
        return $this->products()->count();
    }
}
