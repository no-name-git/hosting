<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seo\StoreRequest;
use App\Http\Requests\Seo\UpdateRequest;
use App\Models\Product;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seos = Seo::paginate(20);
        return view('seo.index', compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::select('id', 'title')->get();
        return view('seo.create', compact('products'));
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
        $seo = Seo::firstOrCreate([
            'product_id' => $data['product_id']
        ], $data);
        return redirect()->route('seo.index')->with('success', 'SEO успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        return view('seo.show', compact('seo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {
        $products = Product::select('id', 'title')->get();
        return view('seo.edit' , compact('seo', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Seo $seo)
    {
        $data = $request->validated();

        $seo->update($data);
        return redirect()->route('seo.index')->with('success', 'SEO успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Seo $seo)
    {
        $seo->delete();
        return redirect()->route('seo.index')->with('success', 'SEO успешно удалено!');
    }
}
