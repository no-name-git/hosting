<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\Node\Stmt\Return_;

class UserService
{

    public function __construct(
        private UserRepository $userRepository,

    )
    {
    }

    public function getList(int $perPage = 20): LengthAwarePaginator
    {
        return $this->userRepository->getList($perPage);
    }

    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function getFind(int $id): User
    {
//        $user = $this->userRepository->getFind($id);
//        $user->products_count = $user->getCountProduct();
//        $user->products_list = $this->userRepository->getProductForUser($id, $perPage = 20);
//        return $user;
        return $this->userRepository->getFind($id);
    }

    public function edit(int $id): User
    {
        return $this->userRepository->getFind($id);
    }

    public function update(array $data, int $id) :User
    {
        return $this->userRepository->update($data, $id);
    }

    public function delete(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

}
