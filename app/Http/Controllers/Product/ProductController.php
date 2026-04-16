<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'title')->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);
        $product = Product::create($data);

            ProductImages::where('product_id', $product->id)->count();
                $file_path = Storage::disk('public')->put('images', $images);
                ProductImages::create([
                    'file_path' => $file_path,
                    'product_id' => $product->id,
                    'is_active' => 1,
                ]);
        return redirect()->route('tag.create')->with('success', 'Продукт успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'title')->get();
        $images = ProductImages::where('product_id', $product->id)->get();
        return view('product.edit', compact('product', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
//        dd($request->all());
            $data = $request->validated();

            if ($request->hasFile('images')){
                $files = $request->file('images');

                $files = is_array($files) ? $files : [$files];

                foreach ($files as $file){
                    $path = $file->store('images', 'public');

                    $update = ProductImages::where('product_id', $product->id)->get();
                    foreach ($update as $item){
                        $item->update([
                            'is_active' => null,
                        ]);
                        Storage::disk('public')->delete($item->file_path);
                    }

                    ProductImages::where('product_id', $product->id)
                        ->whereNull('is_active')
                        ->delete();



                    ProductImages::create([
                        'product_id' => $product->id,
                        'file_path' => $path,
                        'is_active' => 1
                    ]);
                }

            }

            unset($data['images']);
            $product->update($data);

            return redirect()->route('product.show', $product->id)
                ->with('success', 'Продукт успешно обновлен');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Продукт успешно удален');
    }
}
