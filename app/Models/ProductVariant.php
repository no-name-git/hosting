<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $guarded = false;

    // Вариант принадлежит товару (много вариантов -> один товар)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Вариант имеет много значений атрибутов (размер, цвет и т.д.)
    // Связь many-to-many через pivot таблицу
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attribute_value');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'variant_id', 'id');
    }
}
