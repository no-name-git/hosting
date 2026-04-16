@extends('layouts.main', ['title_page' => "Продукты"])


@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary mb-3">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($products) && $products->count() > 0)
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>
                    <a href="{{route('product.show', $product->id)}}">
                        {{$product->title}}
                    </a>
                </td>
                <th scope="row">
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">
                        Редактировать
                    </a>
                </th>
                <td>
                    <form action="{{route('product.delete', $product->id)}}" method="post">
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
