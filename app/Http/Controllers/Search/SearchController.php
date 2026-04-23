<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Http\Requests\Seo\StoreRequest;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct
    (
      protected SearchService $searchService
    ){}
    public function index(SearchRequest $request)
    {
        $data = $request->validated('seek');
        $search = $this->searchService->search($data);

        return view('layouts.search', compact('search'));
    }
}
