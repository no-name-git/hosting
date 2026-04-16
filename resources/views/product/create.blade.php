@extends('layouts.main', ['title_page' => 'Создание категории'])

@section('content')
<form action="{{route('product.store')}}" method="post" style="width: 250px;" class="card card-primary" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        @include('product.layouts.form')

    </div>

    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection
