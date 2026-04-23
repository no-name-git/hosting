@extends('layouts.main', ['title_page' => "теги для товара"])

@section('content')
    <a href="{{route('tag.create')}}" class="btn btn-primary mb-3">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            @if(isset($tag->products) && $tag->products->count() > 0)
                <th scope="col">id товара</th>
            @endif
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($tags) && $tags->count() > 0)
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>
                        <a href="{{route('tag.show', $tag->id)}}">
                            {{$tag->title}}
                        </a>
                    </td>
                    @if(isset($tag->products) && $tag->products->count() > 0)
                        <td>
                            <a href="{{route('product.show', $tag->products->first()->id)}}">
                                {{$tag->products->first()->title}}
                            </a>
                        </td>
                    @endif
                    <th scope="row">
                        <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-warning">
                            Редактировать
                        </a>
                    </th>
                    <td>
                        <form action="{{route('tag.delete', $tag->id)}}" method="post">
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
