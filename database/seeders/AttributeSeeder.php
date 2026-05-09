<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothing = Category::create([
            'title' => 'Одежда',
            'slug' => 'clothing'
        ]);

        $electronics = Category::create([
            'title' => 'Электроника',
            'slug' => 'electronics'
        ]);

        $size = Attribute::create([
            'name' => 'Размер',
            'slug' => 'size'
        ]);

        $size->values()->createMany([
            ['value' => 'S', 'slug' => 's'],
            ['value' => 'M', 'slug' => 'm'],
            ['value' => 'L', 'slug' => 'l'],
        ]);

        $color = Attribute::create([
            'name' => 'Цвет',
            'slug' => 'color'
        ]);

        $color->values()->createMany([
            ['value' => 'Черный', 'slug' => 'black', 'color_hex' => '#000000'],
            ['value' => 'Белый', 'slug' => 'white', 'color_hex' => '#FFFFFF'],
        ]);

        $diagonal = Attribute::create([
            'name' => 'Диагональ экрана',
            'slug' => 'diagonal']);

        $diagonal->values()->createMany([
            ['value' => '6.1"', 'slug' => '6-1'],
            ['value' => '6.7"', 'slug' => '6-7'],
        ]);

        $clothing->attributes()->attach([
            $size->id,
            $color->id
        ]);

        $electronics->attributes()->attach([
            $diagonal->id,
            $color->id
        ]);
    }
}
