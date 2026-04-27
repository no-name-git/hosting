<?php

namespace App\Services;

use App\Models\Color;
use App\Repositories\ColorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ColorService
{

    public function __construct(
        private ColorRepository $colorRepository,

    )
    {
    }

    public function getList(int $perPage = 20): LengthAwarePaginator
    {
        return $this->colorRepository->getList($perPage);
    }

    public function create(array $data): Color
    {
        return $this->colorRepository->create($data);
    }

    public function getFind(int $id): Color
    {
        $color = $this->colorRepository->getFind($id);
        $color->products_count = $color->getCountProduct();
        $color->products_list = $this->colorRepository->getProductForColor($id, $perPage = 20);
        return $color;
    }

    public function edit(int $id): Color
    {
        return $this->colorRepository->getFind($id);
    }

    public function update(array $data, int $id) :Color
    {
        return $this->colorRepository->update($data, $id);
    }

    public function delete(int $id): bool
    {
        return $this->colorRepository->delete($id);
    }

}
