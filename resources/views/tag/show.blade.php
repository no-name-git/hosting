@extends('layouts.main', ['title_page' => $tag->title])


@section('content')
    <table class="table">
        <tbody>

            <tr>
                <th scope="col">#</th>
                <th scope="row">{{$tag->id}}</th>
            </tr>
            <tr>
                <th scope="col">Title:</th>
                <td>{{$tag->title}}</td>
            </tr>
            <tr>
                <th scope="col">Description:</th>
                <td>{{$tag->description}}</td>
            </tr>
            <tr>
                <th scope="col">Keywords:</th>
                <td>{{$tag->keywords}}</td>
            </tr>
            <tr>
                <th scope="col">Редактировать:</th>
                <th scope="row">
                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-warning">
                        Редактировать
                    </a>
                </th>
            </tr>
            <tr>
                <th>Удалить:</th>
                <td>
                    <form action="{{route('tag.delete', $tag->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">удалить</button>
                    </form></td>
            </tr>

        </tbody>
    </table>

@endsection
