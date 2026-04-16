<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hit_products = Product::where('hit_sale', 1)->get();
        return view('index', compact('hit_products'));
    }

    public function catalog()
    {
        $products = Product::with('category')->get();
        $categories = Category::has('products')->get();
        return view('catalog', compact('products', 'categories'));
    }

    public function about()
    {
        return view('about');
    }


}
