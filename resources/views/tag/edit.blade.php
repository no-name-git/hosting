@extends('layouts.main', ['title_page' => 'Редактирование тега'])

@section('content')
<form action="{{route('tag.update', $tag->id)}}" method="post" style="width: 250px;">
    @csrf
    @method('patch')
    @include('tag.layouts.form')
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

@endsection
