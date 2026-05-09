@extends('layouts.main', ['title_page' => "Пользователи"])

@section('content')
    <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ФИО</th>
            <th scope="col">Email</th>
            <th scope="col">роль</th>
            <th scope="col">возрост</th>
            <th scope="col">адрес</th>
            <th scope="col">пол</th>
            <th scope="col">редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($users) && $users->count() > 0)
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <th>
                        <a href="{{route('user.show', $user->id)}}">
                            {{$user->name . ' ' . $user->surname}}
                        </a>
                    </th>
                    <th>
                       {{$user->email}}
                    </th>
                    <th>
                       {{$user->is_admin}}
                    </th>
                    <th>
                        @if(isset($user->age))
                            {{$user->age}}
                        @else
                            <p>не указано</p>
                        @endif
                    </th>
                    <th>
                        @if(isset($user->address))
                            {{$user->address}}
                        @else
                            <p>не указано</p>
                        @endif
                    </th>
                    <th>
                        @if(isset($user->gender))
                            {{$user->gender}}
                        @else
                            <p>не указано</p>
                        @endif
                    </th>

                    <th scope="row">
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning">
                            Редактировать
                        </a>
                    </th>
                    <td>
                        <form action="{{route('user.delete', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
