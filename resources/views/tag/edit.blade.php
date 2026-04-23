@extends('layouts.main', ['title_page' => 'Редактирование категории'])

@section('content')
<form action="{{route('category.update', $category->id)}}" method="post" style="width: 250px;">
    @csrf
    @method('patch')
    @include('category.layouts.form')
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

@endsection
