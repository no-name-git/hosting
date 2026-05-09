<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct(
        private ColorService $colorService
    )
    {
    }

    public function index()
    {
        $colors = $this->colorService->getList();
        return view('color.index', compact('colors'));
    }

    public function create()
    {
        return view('color.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->colorService->create($data);
        return redirect()->route('color.index')->with('success', 'Цвет успешно создан');
    }

    public function show($id)
    {
        $showColor = $this->colorService->getFind($id);
        return view('color.show', compact('showColor'));
    }

    public function edit($id)
    {
        $color = $this->colorService->edit($id);
        return view('color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->colorService->update($data, $id);
        return redirect()->route('color.show', $id)->with('success', 'Цвет успешно обновлен');
    }

    public function delete($id)
    {
        $this->colorService->delete($id);
        return redirect()->route('color.index')->with('success', 'Цвет успешно удален');
    }
}
