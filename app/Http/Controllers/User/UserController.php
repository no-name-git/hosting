<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    )
    {
    }

    public function index()
    {
        $users = $this->userService->getList();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->userService->create($data);
        return redirect()->route('user.index')->with('success', 'Тег успешно создан');
    }

    public function show($id)
    {
        $showUser = $this->userService->getFind($id);
        return view('user.show', compact('showUser'));
    }

    public function edit($id)
    {
        $user = $this->userService->edit($id);
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->userService->update($data, $id);
        return redirect()->route('user.show', $id)->with('success', 'Тег успешно обновлен');
    }

    public function delete($id)
    {
        $this->userService->delete($id);
        return redirect()->route('user.index')->with('success', 'Тег успешно удален');
    }
}
