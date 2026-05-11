<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seo\SeoController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Color\ColorController;
use App\Http\Controllers\User\UserController;
use \App\Http\Controllers\Search\SearchController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/adminboard', [\App\Http\Controllers\Main\IndexController::class, 'index'])->middleware(['auth', 'admin'])->name('main.index');

//CATEGORY
Route::middleware('admin')->prefix('category')->group(function (){
   Route::get('/', [CategoryController::class, 'index'])->name('category.index');
   Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
   Route::post('/', [CategoryController::class, 'store'])->name('category.store');
   Route::get('/{category}/show', [CategoryController::class, 'show'])->name('category.show');
   Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
   Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
   Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
});

//PRODUCT
Route::middleware('admin')->prefix('product')->group(function (){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/{product}/show', [ProductController::class, 'show'])->name('product.show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [ProductController::class, 'delete'])->name('product.delete');
});

//SEO
Route::middleware('admin')->prefix('seo')->group(function (){
    Route::get('/', [SeoController::class, 'index'])->name('seo.index');
    Route::get('/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('/', [SeoController::class, 'store'])->name('seo.store');
    Route::get('/{seo}/show', [SeoController::class, 'show'])->name('seo.show');
    Route::get('/{seo}/edit', [SeoController::class, 'edit'])->name('seo.edit');
    Route::patch('/{seo}', [SeoController::class, 'update'])->name('seo.update');
    Route::delete('/{seo}', [SeoController::class, 'delete'])->name('seo.delete');
});

//TAG
Route::middleware('admin')->prefix('tag')->group(function (){
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/', [TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/show', [TagController::class, 'show'])->name('tag.show');
    Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::patch('/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [TagController::class, 'delete'])->name('tag.delete');
});

//Color
Route::middleware('admin')->prefix('color')->group(function (){
    Route::get('/', [ColorController::class, 'index'])->name('color.index');
    Route::get('/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('/', [ColorController::class, 'store'])->name('color.store');
    Route::get('/{color}/show', [ColorController::class, 'show'])->name('color.show');
    Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
    Route::patch('/{color}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/{color}', [ColorController::class, 'delete'])->name('color.delete');
});
//Profile
Route::middleware('admin')->prefix('user')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
});

Route::get('/search', [SearchController::class, 'index'])
    ->middleware('admin')
    ->name('search');


require __DIR__.'/auth.php';
