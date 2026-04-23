<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', $tag->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror"
           placeholder="Введите title">
    @error('title')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text"
           name="description"
           id="description"
           value="{{ old('description', $tag->description ?? '') }}"
           class="form-control @error('description') is-invalid @enderror"
           placeholder="Введите description">
    @error('description')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="keywords" class="form-label">Keywords</label>
    <input type="text"
           name="keywords"
           id="keywords"
           value="{{ old('keywords', $tag->keywords ?? '') }}"
           class="form-control @error('keywords') is-invalid @enderror"
           placeholder="Введите keywords">
    @error('keywords')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
@if(!isset($tag->product_id))
    <div class="form-group">
        <label>Продукт</label>
        <select class="form-control @error('product_id') is-invalid @enderror" name="product_id">
            <option value="">Выберите продукт</option>
            @foreach($products as $product)
                <option
                    value="{{$product->id}}"
                    @if(old('product_id', $tag->product_id ?? null) == $product->id)
                        selected
                    @endif
                >
                    {{$product->title}}
                </option>
            @endforeach
        </select>

        @error('product_id')
        <div class="invalid-feedback d-block">
            <i class="bi bi-exclamation-circle"></i> {{ $message }}
        </div>
        @enderror
    </div>

@endif
