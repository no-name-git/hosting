<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getList(int $perPage): LengthAwarePaginator
    {
        return User::paginate($perPage);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function getFind($id) : ?User
    {
        return User::find($id);
    }

    public function getProductForUser($id, $perPage) :LengthAwarePaginator
    {
        $tag = User::findOrFail($id);
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
        return User::destroy($id);
    }
}
