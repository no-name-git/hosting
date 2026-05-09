@extends('layouts.main', ['title_page' => $search['query']])

@section('content')
    <p>по вашему запросу: <i>'{{$search['query']}}'</i> найдено {{$search['total']}} записей</p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">категории:</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($search['category']) && $search['category']->total() > 0)
                @foreach($search['category'] as $category)
                    <tr>
                        <td>
                            <a href="{{route('category.show', $category->id)}}">{{$category->title}}</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <th scope="row">нет совпадения</th>
            @endif
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">продукты:</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($search['product']) && $search['product']->total() > 0)
            @foreach($search['product'] as $product)
                <tr>
                    <td>
                        <a href="{{route('product.show', $product->id)}}">{{$product->title}}</a>
                    </td>
                </tr>
            @endforeach
        @else
            <th scope="row">нет совпадения</th>
        @endif
        </tbody>
    </table>

@endsection
