<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(
        private TagService $tagService
    )
    {
    }

    public function index()
    {
        $tags = $this->tagService->getList();
        return view('tag.index', compact('tags'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->tagService->create($data);
        return redirect()->route('tag.index')->with('success', 'Тег успешно создан');
    }

    public function show($id)
    {
        $showTag = $this->tagService->getFind($id);
        return view('tag.show', compact('showTag'));
    }

    public function edit($id)
    {
        $tag = $this->tagService->edit($id);
        return view('tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->tagService->update($data, $id);
        return redirect()->route('tag.show', $id)->with('success', 'Тег успешно обновлен');
    }

    public function delete($id)
    {
        $this->tagService->delete($id);
        return redirect()->route('tag.index')->with('success', 'Тег успешно удален');
    }
}
