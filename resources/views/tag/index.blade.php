@extends('layouts.main', ['title_page' => "Теги"])


@section('content')
    <a href="{{route('tag.create')}}" class="btn btn-primary mb-3">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Keywords</th>
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
                <td>{{$tag->description}}</td>
                <td>{{$tag->keywords}}</td>
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
