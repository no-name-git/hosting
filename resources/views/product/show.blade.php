@extends('layouts.main', ['title_page' => $product->title])

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $product->title }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px;">ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th>Название</th>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <th>Описание</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th>Категория</th>
                        <td>{{ $product->category->title ?? 'Не указана' }}</td>
                    </tr>

                    <tr>
                        <th>Создан</th>
                        <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Обновлен</th>
                        <td>{{ $product->updated_at->format('d.m.Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Варианты товара -->
            <div class="mt-4">
                <h4>Варианты товара ({{ $product->variants->count() }})</h4>

                @if($product->variants->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Изображения</th>
                                    <th>SKU</th>
                                    <th>Атрибуты</th>
                                    <th>Цена</th>
                                    <th>Старая цена</th>
                                    <th>Скидка</th>
                                    <th>Остаток</th>
                                    <th>Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->variants as $variant)
                                    <tr>
                                        <td>

                                        @if($variant->images->count() > 0)
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach($variant->images as $image)
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/' . $image->file_path) }}"
                                                                 alt="{{ $product->title }}"
                                                                 style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                                            @if($image->is_main)
                                                                <span class="badge bg-success position-absolute top-0 start-0 m-1">Главная</span>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-muted">Нет изображений</span>
                                            @endif
                                        </td>
                                        <td><code>{{ $variant->sku }}</code></td>
                                        <td>
                                            @foreach($variant->attributeValues as $attrValue)
                                                <span class="badge bg-info me-1">
                                                    {{ $attrValue->attribute->name }}: {{ $attrValue->value }}
                                                    @if($attrValue->color_hex)
                                                        <span style="display: inline-block; width: 12px; height: 12px; background: {{ $attrValue->color_hex }}; border-radius: 50%; border: 1px solid #ccc;"></span>
                                                    @endif
                                                </span>
                                            @endforeach
                                        </td>
                                        <td><strong>{{ number_format($variant->price, 2) }} ₽</strong></td>
                                        <td>
                                            @if($variant->old_price)
                                                <s>{{ number_format($variant->old_price, 2) }} ₽</s>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($variant->discount)
                                                <span class="badge bg-danger">-{{ $variant->discount }}%</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($variant->count > 0)
                                                <span class="badge bg-success">{{ $variant->count }} шт</span>
                                            @else
                                                <span class="badge bg-secondary">Нет в наличии</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($variant->is_active)
                                                <span class="badge bg-success">Активен</span>
                                            @else
                                                <span class="badge bg-secondary">Неактивен</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning">
                        У товара нет вариантов
                    </div>
                @endif
            </div>

            <!-- Действия -->
            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Редактировать
                </a>

                <form action="{{ route('product.delete', $product->id) }}" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">
                        <i class="bi bi-trash"></i> Удалить
                    </button>
                </form>

                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection
