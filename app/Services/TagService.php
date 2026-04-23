<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{

    public function __construct(
        private TagRepository $tagRepository
    )
    {
    }

    public function getList(int $perPage = 20): LengthAwarePaginator
    {
        return $this->tagRepository->getList($perPage);
    }

    public function create(array $data): Tag
    {
        return $this->tagRepository->create($data);
    }
}
