<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'tags';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
