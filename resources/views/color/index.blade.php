@extends('layouts.main', ['title_page' => "цвета для товара"])

@section('content')
    <a href="{{route('color.create')}}" class="btn btn-primary mb-3">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
                <th scope="col">название товара</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($colors) && $colors->count() > 0)
            @foreach($colors as $color)
                <tr>
                    <th scope="row">{{$color->id}}</th>
                    <td>
                        <a href="{{route('color.show', $color->id)}}">
                            {{$color->title}}
                        </a>
                    </td>
                    @if(isset($color->products) && $color->products->count() > 0)
                        <td>
                            <a href="{{route('product.show', $color->products->first()->id)}}">
                                {{$color->products->first()->title}}
                            </a>
                        </td>
                    @else
                        <td>
                            <p>у цвета нет товаров</p>
                        </td>
                    @endif
                    <th scope="row">
                        <a href="{{route('color.edit', $color->id)}}" class="btn btn-warning">
                            Редактировать
                        </a>
                    </th>
                    <td>
                        <form action="{{route('color.delete', $color->id)}}" method="post">
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
