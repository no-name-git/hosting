<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
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
}
