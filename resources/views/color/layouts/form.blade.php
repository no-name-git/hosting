<div class="mb-3">
    <label for="code" class="form-label">Code</label>
    <input type="text"
           name="code"
           id="code"
           value="{{ old('code', $color->code ?? '') }}"
           class="form-control @error('code') is-invalid @enderror"
           placeholder="Введите код цвета без #">


    @error('code')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror

    <label for="title" class="form-label">Название</label>
    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', $color->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror"
           placeholder="Введите название">

    @error('title')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
@enderror
