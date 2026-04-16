<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $guarded = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function test()
    {
        return 111;
    }
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}
