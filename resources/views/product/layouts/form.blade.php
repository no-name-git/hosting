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
    <label for="title" class="form-label">Описание</label>
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
<div class="">
    <label for="title" class="form-label">Состав</label>
    <textarea
        name="structure"
        id="structure"
        cols="10" rows="2"
        class="form-control @error('structure') is-invalid @enderror"
    >
        {{ old('structure', $product->structure ?? '') }}
    </textarea>
    @error('structure')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<div class="">
    <label for="cooking_method" class="form-label">Метод приготовления</label>
    <input type="text"
           name="cooking_method"
           id="cooking_method"
           value="{{ old('cooking_method', $product->cooking_method ?? '') }}"
           class="form-control @error('cooking_method') is-invalid @enderror"
           placeholder="Введите метод приготовления">
    @error('cooking_method')
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

<div class="">
    <label for="calories" class="form-label">Калории</label>
    <input type="number"
           name="calories"
           id="calories"
           value="{{ old('calories', $product->calories ?? '') }}"
           class="form-control @error('calories') is-invalid @enderror"
           placeholder="Введите количество калорий"
           min="0"
    >
    @error('calories')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
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

