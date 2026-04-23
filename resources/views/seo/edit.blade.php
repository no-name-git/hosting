@extends('layouts.main', ['title_page' => 'Редактирование тега'])

@section('content')
    <form action="{{route('seo.update', $tag->id)}}" method="post" style="width: 250px;">
        @csrf
        @method('patch')
        @include('seo.layouts.form')
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>

@endsection
