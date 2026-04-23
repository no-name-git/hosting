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
