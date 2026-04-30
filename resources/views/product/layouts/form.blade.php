<div class="">
    <label for="title" class="form-label">Название</label>
    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', $product->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror"
           placeholder="Введите название">
    @error('title')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<div class="">
    <label for="title" class="form-label">Контент</label>
    <textarea
        name="description"
        id="description"
        cols="30" rows="10"
        class="form-control @error('description') is-invalid @enderror"
    >
        {{ old('description', $product->description ?? '') }}
    </textarea>
    @error('description')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-2">
    <label for="price" class="form-label">Цена</label>
    <input type="number"
           name="price"
           id="price"
           value="{{ old('price', $product->price ?? '') }}"
           class="form-control @error('price') is-invalid @enderror"
           placeholder="Введите цену"
           min="0"
    >
    @error('price')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-2">
    <label for="discount" class="form-label">Скидка</label>
    <input type="number"
           name="discount"
           id="discount"
           value="{{ old('discount', $product->discount ?? '') }}"
           class="form-control @error('discount') is-invalid @enderror"
           placeholder="Введите скидку в %"
           min="0"
    >
    @error('discount')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<input type="hidden" name="oldPrice">
<div class="mb-2">
    <label for="count" class="form-label">Количество товара</label>
    <input type="number"
           name="count"
           id="count"
           value="{{ old('count', $product->count ?? '') }}"
           class="form-control @error('count') is-invalid @enderror"
           placeholder="Введите количество товара"
           min="0"
    >
    @error('count')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-2 custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" name="is_published" value="1"
           @checked(old('is_published', isset($product) ? $product->is_published: true))  class="custom-control-input"
           id="customSwitch3">
    <label class="custom-control-label" for="customSwitch3">
        Опубликовано
    </label>
    @error('is_published')
    <div class="mt-1 alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2 custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="hidden" name="hit_sale" value="0">
    <input type="checkbox" name="hit_sale" value="1"
           @checked(old('hit_sale', isset($product) ? $product->hit_sale: false))  class="custom-control-input"
           id="customSwitch4">
    <label class="custom-control-label" for="customSwitch4">
        Хит продаж
    </label>
    @error('hit_sale')
    <div class="mt-1 alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Категория</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
        <option value="">Выберите категорию</option>
@foreach($categories as $category)
            <option
                value="{{$category->id}}"
                @if(old('category_id', $product->category_id ?? null) == $category->id)
                    selected
                @endif
            >
                {{$category->title}}
            </option>
        @endforeach
    </select>

    @error('category_id')
    <div class="invalid-feedback d-block">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <div>
        <label>Цвета</label>
        <select name="colors[]" class="form-control" multiple size="5">
            @foreach($colors as $color)
                <option
                    value="{{ $color->id }}"
                    @if(old('colors', $selectedColors ?? []) && in_array($color->id, old('colors', $selectedColors ?? [])))
                        selected
                    @endif
                >
                    {{ $color->title }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-muted">Зажмите Ctrl (Cmd) для выбора нескольких тегов</small>

    </div>

    @error('colors')
    <div class="invalid-feedback d-block">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <div>
        <label>Теги</label>
        <select name="tags[]" class="form-control" multiple size="5">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">Зажмите Ctrl (Cmd) для выбора нескольких тегов</small>

    </div>

    @error('tags')
    <div class="invalid-feedback d-block">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>



<!-- Добавление новых изображений -->
<div class="mb-4">
    <h5>
        <i class="bi bi-cloud-upload me-2"></i>Добавить новые изображения
    </h5>

    <input type="file" name="images">
    @error('images')
    <div class="alert alert-danger mt-3" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ $message }}
    </div>
    @enderror
    @if(isset($images))
        <div class="mt-4 flex flex-col">

        @foreach($images as $image)
            <img src="{{$image->imageUrl}}" alt="{{$image->file_path}}" style="width: 350px">
        @endforeach
        </div>

    @endif
</div>

