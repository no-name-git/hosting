<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TagRepository
{
    public function getList(int $perPage = 20): LengthAwarePaginator
    {
        return Tag::paginate($perPage);
    }

    public function getForProduct()
    {
        return Tag::select('id', 'title')->get();
    }

    public function create(array $data): Tag
    {
        return Tag::create($data);
    }

    public function getFind($id) : ?Tag
    {
        return Tag::find($id);
    }

    public function getProductForTag($id, $perPage) :LengthAwarePaginator
    {
        $tag = Tag::findOrFail($id);
        return $tag->products()->paginate($perPage);

    }

    public function update($data, $id)
    {
        $tag = $this->getFind($id);
        $tag->update($data);
        return $tag->fresh();
    }

    public function delete($id): bool
    {
        return Tag::destroy($id);
    }
}
