<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/fbhmechdhe', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/nkvfnfalpp', [\App\Http\Controllers\Main\IndexController::class, 'index'])->middleware(['auth', 'admin'])->name('main.index');

//CATEGORY
Route::middleware('admin')->prefix('category')->group(function (){
   Route::get('/', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('category.index');
   Route::get('/create', [App\Http\Controllers\Category\CategoryController::class, 'create'])->name('category.create');
   Route::post('/', [App\Http\Controllers\Category\CategoryController::class, 'store'])->name('category.store');
   Route::get('/{category}/show', [App\Http\Controllers\Category\CategoryController::class, 'show'])->name('category.show');
   Route::get('/{category}/edit', [App\Http\Controllers\Category\CategoryController::class, 'edit'])->name('category.edit');
   Route::patch('/{category}', [App\Http\Controllers\Category\CategoryController::class, 'update'])->name('category.update');
   Route::delete('/{category}', [App\Http\Controllers\Category\CategoryController::class, 'delete'])->name('category.delete');
});

//PRODUCT
Route::middleware('admin')->prefix('product')->group(function (){
    Route::get('/', [App\Http\Controllers\Product\ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [App\Http\Controllers\Product\ProductController::class, 'create'])->name('product.create');
    Route::post('/', [App\Http\Controllers\Product\ProductController::class, 'store'])->name('product.store');
    Route::get('/{product}/show', [App\Http\Controllers\Product\ProductController::class, 'show'])->name('product.show');
    Route::get('/{product}/edit', [App\Http\Controllers\Product\ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/{product}', [App\Http\Controllers\Product\ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [App\Http\Controllers\Product\ProductController::class, 'delete'])->name('product.delete');
});

//SEO
Route::middleware('admin')->prefix('seo')->group(function (){
    Route::get('/', [App\Http\Controllers\Seo\SeoController::class, 'index'])->name('seo.index');
    Route::get('/create', [App\Http\Controllers\Seo\SeoController::class, 'create'])->name('seo.create');
    Route::post('/', [App\Http\Controllers\Seo\SeoController::class, 'store'])->name('seo.store');
    Route::get('/{seo}/show', [App\Http\Controllers\Seo\SeoController::class, 'show'])->name('seo.show');
    Route::get('/{seo}/edit', [App\Http\Controllers\Seo\SeoController::class, 'edit'])->name('seo.edit');
    Route::patch('/{seo}', [App\Http\Controllers\Seo\SeoController::class, 'update'])->name('seo.update');
    Route::delete('/{seo}', [App\Http\Controllers\Seo\SeoController::class, 'delete'])->name('seo.delete');
});

//TAG
Route::middleware('admin')->prefix('tag')->group(function (){
    Route::get('/', [App\Http\Controllers\Tag\TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [App\Http\Controllers\Tag\TagController::class, 'create'])->name('tag.create');
    Route::post('/', [App\Http\Controllers\Tag\TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/show', [App\Http\Controllers\Tag\TagController::class, 'show'])->name('tag.show');
    Route::get('/{tag}/edit', [App\Http\Controllers\Tag\TagController::class, 'edit'])->name('tag.edit');
    Route::patch('/{tag}', [App\Http\Controllers\Tag\TagController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [App\Http\Controllers\Tag\TagController::class, 'delete'])->name('tag.delete');
});
Route::get('/search', [\App\Http\Controllers\Search\SearchController::class, 'index'])
    ->middleware('admin')
    ->name('search');
Route::get('/', [App\Http\Controllers\Index\IndexController::class, 'index'])->name('index.index');
Route::get('/catalog', [App\Http\Controllers\Index\IndexController::class, 'catalog'])->name('index.catalog');
Route::get('/about', [App\Http\Controllers\Index\IndexController::class, 'about'])->name('index.about');

require __DIR__.'/auth.php';
