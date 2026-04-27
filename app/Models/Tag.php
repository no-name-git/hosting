<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'tags';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }

    public function getCountProduct() :int
    {
        return $this->products()->count();
    }

}
