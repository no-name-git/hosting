<?php

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ColorRepository
{
    public function getList(int $perPage): LengthAwarePaginator
    {
        return Color::paginate($perPage);
    }

    public function create(array $data): Color
    {
        return Color::create($data);
    }

    public function getFind($id) : ?Color
    {
        return Color::find($id);
    }

    public function getProductForColor($id, $perPage) :LengthAwarePaginator
    {
        $color = Color::findOrFail($id);
        return $color->products()->paginate($perPage);

    }

    public function update($data, $id)
    {
        $color = $this->getFind($id);
        $color->update($data);
        return $color->fresh();
    }

    public function delete($id): bool
    {
        return Color::destroy($id);
    }
}
