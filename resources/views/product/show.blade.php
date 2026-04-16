@extends('layouts.main', ['title_page' => $product->title])


@section('content')
    <table class="table">
        <tbody>

            <tr>
                <th scope="col">#</th>
                <th scope="row">{{$product->id}}</th>
            </tr>
            <tr>
                <th scope="col">Название:</th>
                <td>{{$product->title}}</td>
            </tr>
            <tr>
            <tr>
                <th scope="col">Описание:</th>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
            <tr>
                <th scope="col">Состав:</th>
                <td>
                    @if(!$product->structure)
                        нет данных
                    @else
                        {{$product->structure}}
                    @endif
                </td>
            </tr>
            <tr>
            <tr>
                <th scope="col">Метод приготовления:</th>
                <td>
                    @if(!$product->cooking_method)
                        нет данных
                    @else
                        {{$product->cooking_method}}
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="col">Цена:</th>
                <td>{{$product->price}}</td>
            </tr>
            <tr>
                <th scope="col">Опубликовано:</th>
                <td>{{$product->published}}</td>
            </tr>
            <tr>
                <th scope="col">Калории:</th>
                <td>
                    @if(!$product->calories)
                        нет данных
                    @else
                        {{$product->calories}}
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="col">Хит продаж:</th>
                <td>{{$product->sale}}</td>
            </tr>
            <tr>
                <th scope="col">Картинки:</th>
                <td>
                    @foreach($product->productImages as $item)
                        <img src="{{$item->imageUrl}}" alt="{{$product->title}}" style="width: 150px; margin-right: 4px;">
                    @endforeach
                </td>
            </tr>
            <tr>
                <th scope="col">Категории:</th>
                <td>{{$product->category->title}}</td>
            </tr>
            <tr>
                <th scope="col">Редактировать:</th>
                <th scope="row">
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">
                        Редактировать
                    </a>
                </th>
            </tr>
            <tr>
                <th>Удалить:</th>
                <td>
                    <form action="{{route('product.delete', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">удалить</button>
                    </form></td>
            </tr>

        </tbody>
    </table>

@endsection

