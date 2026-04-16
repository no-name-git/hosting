@extends('layouts.main', ['title_page' => 'Создание тега'])

@section('content')
<form action="{{route('tag.store')}}" method="post" style="width: 250px;">
    @csrf
    @include('tag.layouts.form')
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection
