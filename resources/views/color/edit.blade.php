@extends('layouts.main', ['title_page' => 'Редактирование цвета'])

@section('content')
<form action="{{route('color.update', $color->id)}}" method="post" style="width: 250px;">
    @csrf
    @method('patch')
    @include('color.layouts.form')
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

@endsection
