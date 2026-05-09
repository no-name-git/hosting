<div class="mb-3">
    <label for="title" class="form-label">Название</label>
    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', $category->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror"
           placeholder="Введите название">

@error('title')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
@enderror
</div>
<div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text"
           name="slug"
           id="slug"
           value="{{ old('slug', $category->slug ?? '') }}"
           class="form-control @error('slug') is-invalid @enderror"
           placeholder="Введите Slug">

    @error('slug')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
<p>Атрибуты</p>

<div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text"
           name="attributes[name]"
           id="name"
           value="{{ old('attributes.name', $attribute->name ?? '') }}"
           class="form-control @error('attributes[name]') is-invalid @enderror"
           placeholder="Введите название">

    @error('attributes[name]')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">slug</label>
    <input type="text"
           name="attributes[slug]"
           id="slug"
           value="{{ old('attributes.slug', $attribute->slug ?? '') }}"
           class="form-control @error('attributes[slug]') is-invalid @enderror"
           placeholder="Введите slug">

    @error('attributes[slug]')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>
