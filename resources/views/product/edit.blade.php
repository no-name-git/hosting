@extends('layouts.main', ['title_page' => 'Редактирование продукта'])

@section('content')
<form action="{{route('product.update', $product->id)}}" method="post" style="width: 250px;" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @include('product.layouts.form')
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

@endsection
