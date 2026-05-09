<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{

    public function __construct(
        private TagRepository $tagRepository,

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

    public function getFind(int $id): Tag
    {
        $tag = $this->tagRepository->getFind($id);
        $tag->products_count = $tag->getCountProduct();
        $tag->products_list = $this->tagRepository->getProductForTag($id, $perPage = 20);
        return $tag;
    }

    public function edit(int $id): Tag
    {
        return $this->tagRepository->getFind($id);
    }

    public function update(array $data, int $id) :Tag
    {
        return $this->tagRepository->update($data, $id);
    }

    public function delete(int $id): bool
    {
        return $this->tagRepository->delete($id);
    }

}
