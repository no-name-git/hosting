<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Размер, Цвет, Материал и т.д.
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_required')->default(false); // обязательный ли атрибут
            $table->boolean('is_filterable')->default(true); // использовать в фильтрах
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
};
