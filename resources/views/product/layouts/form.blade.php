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

<div class="mb-2 custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" name="is_published" value="1"
{{--           @checked(old('is_published', isset($product) ? $product->is_published: true))  class="custom-control-input"--}}
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
{{--           @checked(old('hit_sale', isset($product) ? $product->hit_sale: false))  class="custom-control-input"--}}
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
        @foreach($data['categoryForProduct'] as $category)
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
    <label>Цвет</label>
    <select class="form-control @error('color') is-invalid @enderror" name="color">
        <option value="">Выберите цвет</option>
        @foreach($data['colorForProduct'] as $color)
            <option
                value="{{$color->id}}"
                @if(old('color', $product->colors ?? null) == $color->id)
                    selected
                @endif
                style="background: {{'#' . $color->code}}; border: 1px solid; display: inline-block; "
            >
                {{$color->title}}
            </option>
        @endforeach
    </select>

    @error('color')
    <div class="invalid-feedback d-block">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <div>
        <label>Теги</label>
        <select name="tags[]" class="form-control" multiple size="5">
            @foreach($data['tagForProduct'] as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">Зажмите Ctrl (Cmd) для выбора нескольких тегов</small>

    </div>

    @error('color')
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

