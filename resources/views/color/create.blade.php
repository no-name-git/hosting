@extends('layouts.main', ['title_page' => 'Создание цветов для товаров'])

@section('content')
<form action="{{route('color.store')}}" method="post" style="width: 250px;">
    @csrf
    @include('color.layouts.form')
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection
