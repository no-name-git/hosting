@extends('layouts.main', ['title_page' => 'Редактирование пользователя'])

@section('content')
<form action="{{route('user.update', $user->id)}}" method="post" style="width: 250px;">
    @csrf
    @method('patch')
    @include('user.layouts.form')
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

@endsection
