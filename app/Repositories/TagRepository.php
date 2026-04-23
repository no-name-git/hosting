<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagRepository
{
    public function getList(int $perPage): LengthAwarePaginator
    {
        return Tag::paginate($perPage);
    }

    public function create(array $data): Tag
    {
        return Tag::create($data);
    }

}
