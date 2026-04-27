@extends('layouts.main', ['title_page' => 'Создание пользователя'])

@section('content')
<form action="{{route('user.store')}}" method="post" style="width: 250px;">
    @csrf
    @include('user.layouts.form')
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection
