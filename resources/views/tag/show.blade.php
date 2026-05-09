@extends('layouts.main', ['title_page' => $showTag->title])


@section('content')
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$showTag->id}}</th>
        </tr>
        <tr>
            <th scope="col">Название:</th>
            <td>{{$showTag->title}}</td>
        </tr>
        <tr>
            <th scope="col">Количество продуктов в теги:</th>
            <td>{{$showTag->products_count}}</td>
        </tr>
        <tr>
            <th scope="col">Редактировать:</th>
            <th scope="row">
                <a href="{{route('tag.edit', $showTag->id)}}" class="btn btn-warning">
                    Редактировать
                </a>
            </th>
        </tr>
        <tr>
            <th>Удалить:</th>
            <td>
                <form action="{{route('tag.delete', $showTag->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">удалить</button>
                </form>
            </td>
        </tr>

        </tbody>
    </table>
    @if(isset($showTag->products_list) && $showTag->products_count > 0)
        <div style="width: 100%; max-width: 700px">
            <p style="margin-bottom: 16px;">Товары данного тега:</p>
            @foreach($showTag->products_list as $product)
                <div
                    style="border: 1px solid #88939e; border-radius: 20px; padding: 10px 20px; display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <a href="{{route('product.show', $product->id)}}">{{Str::limit($product->title, 30, '...')}}</a>
                    <div style="display: flex; justify-content: space-between; gap: 20px">
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">Редактировать
                            продукт</a>
                        <form action="{{route('product.delete', $product->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation">
                {{ $showTag->products_list->links('pagination::bootstrap-5') }}
            </nav>
        </div>

    @else
        Товары у тега отсутствуют. <a href="{{route('product.create')}}">Создать продукт?</a>
    @endif
@endsection
