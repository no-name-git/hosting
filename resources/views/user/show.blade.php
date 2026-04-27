@extends('layouts.main', ['title_page' => $showUser->title])


@section('content')
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$showUser->id}}</th>
        </tr>
        <tr>
            <th scope="col">ФИО:</th>
            <td>{{$showUser->name . ' ' . $showUser->surname}}</td>
        </tr>
        <tr>
            <th scope="col">Email:</th>
            <td>{{$showUser->email}}</td>
        </tr>
        <tr>
            <th scope="col">Роль:</th>
            <td>{{$showUser->is_admin}}</td>
        </tr>
        <tr>
            <th scope="col">Возраст:</th>
            <td>@if(isset($user->age))
                    {{$user->age}}
                @else
                    <p>не указано</p>
                @endif</td>
        </tr>
        <tr>
            <th scope="col">Адрес:</th>
            <td> @if(isset($user->address))
                    {{$user->address}}
                @else
                    <p>не указано</p>
                @endif</td>
        </tr>
        <tr>
            <th scope="col">Пол:</th>
            <td>@if(isset($user->gender))
                    {{$user->gender}}
                @else
                    <p>не указано</p>
                @endif</td>
        </tr>

        <tr>
            <th scope="col">Редактировать:</th>
            <th scope="row">
                <a href="{{route('tag.edit', $showUser->id)}}" class="btn btn-warning">
                    Редактировать
                </a>
            </th>
        </tr>
        <tr>
            <th>Удалить:</th>
            <td>
                <form action="{{route('tag.delete', $showUser->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">удалить</button>
                </form>
            </td>
        </tr>

        </tbody>
    </table>

{{--    ТУТ СДЕЛАЕМ ЗАКАЗЫ ПОЛЬЗОВАТЕЛЯ--}}

{{--    @if(isset($showUser->products_list) && $user->products_count > 0)--}}
{{--        <div style="width: 100%; max-width: 700px">--}}
{{--            <p style="margin-bottom: 16px;">Товары данного тега:</p>--}}
{{--            @foreach($user->products_list as $product)--}}
{{--                <div--}}
{{--                    style="border: 1px solid #88939e; border-radius: 20px; padding: 10px 20px; display: flex; justify-content: space-between; margin-bottom: 10px;">--}}
{{--                    <a href="{{route('product.show', $product->id)}}">{{Str::limit($product->title, 30, '...')}}</a>--}}
{{--                    <div style="display: flex; justify-content: space-between; gap: 20px">--}}
{{--                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">Редактировать--}}
{{--                            продукт</a>--}}
{{--                        <form action="{{route('product.delete', $product->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            <button class="btn btn-danger" type="submit">удалить</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <nav class="mt-3" aria-label="Page navigation">--}}
{{--                {{ $user->products_list->links('pagination::bootstrap-5') }}--}}
{{--            </nav>--}}
{{--        </div>--}}

{{--    @else--}}
{{--        Товары у тега отсутствуют. <a href="{{route('product.create')}}">Создать продукт?</a>--}}
{{--    @endif--}}
@endsection
