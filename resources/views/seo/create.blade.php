@extends('layouts.main', ['title_page' => 'Создание тега'])

@section('content')
    <form action="{{route('seo.store')}}" method="post" style="width: 250px;">
        @csrf
        @include('seo.layouts.form')
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection
