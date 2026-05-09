<?php

namespace App\Repositories;

use App\Models\Attribute;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AttributeRepository
{
    public function create(array $data): Attribute
    {
        return Attribute::create($data);
    }
}
