@extends('layouts.main', ['title_page' => "категории"])

@section('content')
    <a href="{{route('category.create')}}" class="btn btn-primary mb-3">Создать</a>
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
        @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>
                        <a href="{{route('category.show', $category->id)}}">
                            {{$category->title}}
                        </a>
                    </td>
                    <th scope="row">
                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-warning">
                            Редактировать
                        </a>
                    </th>
                    <td>
                        <form action="{{route('category.delete', $category->id)}}" method="post">
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
