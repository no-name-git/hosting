@extends('layouts.main', ['title_page' => 'Создание категории'])

@section('content')
<form action="{{route('category.store')}}" method="post" style="width: 250px;">
    @csrf
    @include('category.layouts.form')
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection
