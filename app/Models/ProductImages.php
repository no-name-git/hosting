<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $guarded = false;

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id', 'id');
    }

    protected $appends = ['image_url'];
    protected $casts = [
        'is_main' => 'boolean'
    ];
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}
