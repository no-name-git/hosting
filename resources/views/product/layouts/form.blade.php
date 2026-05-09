<div class="mb-3">
    <label for="title" class="form-label">Название товара</label>
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

<div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea
        name="description"
        id="description"
        cols="30" rows="5"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Введите описание товара"
    >{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
    <div class="invalid-feedback">
        <i class="bi bi-exclamation-circle"></i> {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Категория</label>
    <select class="form-control @error('category_id') is-invalid @enderror"
            name="category_id"
            id="category_select">
        <option value="">Выберите категорию</option>
        @foreach($categories as $category)
            <option
                value="{{$category->id}}"
                data-attributes='@json($category->attributes)'
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


<!-- Варианты товара -->
<div class="mb-4">
    <h5><i class="bi bi-box-seam me-2"></i>Варианты товара</h5>
    <div id="variants-container">
        @if(isset($product) && $product->variants->count() > 0)
            @foreach($product->variants as $index => $variant)
                <div class="variant-item card mb-3 p-3" data-index="{{ $index }}">
                    <h6>Вариант #{{ $index + 1 }}</h6>

                    <!-- Картинки товара -->
                    <div class="mb-4">
                        <h5><i class="bi bi-images me-2"></i>Изображения товара</h5>
                        <input type="file"
                               name="variants[{{$index}}][images][]"
                               multiple
                               accept="image/*"
                               class="form-control @error('images') is-invalid @enderror">
                        <small class="form-text text-muted">Можно загрузить до 10 изображений. Первое будет главным.</small>

                        @error('images')
                        <div class="invalid-feedback d-block">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror

                        @if(isset($product) && $product->productImages->count() > 0)
                            <div class="mt-3">
                                <p><strong>Текущие изображения:</strong></p>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($product->productImages as $image)
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $image->file_path) }}"
                                                 alt="{{$product->title}}"
                                                 style="width: 100px; height: 100px; object-fit: cover;">
                                            @if($image->is_main)
                                                <span class="badge bg-success position-absolute top-0 start-0">Главная</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    <div class="row" style="flex-direction: column; ">
                        <div class="mb-2">
                            <label>Артикул (SKU)</label>
                            <input type="text"
                                   name="variants[{{$index}}][sku]"
                                   value="{{ old('variants.'.$index.'.sku', $variant->sku) }}"
                                   class="form-control @error("variants.{$index}.sku") is-invalid @enderror"
                                   placeholder="NIKE-001-M-BLACK" required>
                            @error("variants.{$index}.sku")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label>Цена</label>
                            <input type="number"
                                   name="variants[{{$index}}][price]"
                                   value="{{ old('variants.'.$index.'.price', $variant->price) }}"
                                   class="form-control @error("variants.{$index}.price") is-invalid @enderror"
                                   min="0" step="0.01" required>
                            @error("variants.{$index}.price")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label>Старая цена</label>
                            <input type="number"
                                   name="variants[{{$index}}][old_price]"
                                   value="{{ old('variants.'.$index.'.old_price', $variant->old_price) }}"
                                   class="form-control"
                                   min="0" step="0.01">
                        </div>

                        <div class="mb-2">
                            <label>Количество</label>
                            <input type="number"
                                   name="variants[{{$index}}][count]"
                                   value="{{ old('variants.'.$index.'.count', $variant->count) }}"
                                   class="form-control @error("variants.{$index}.count") is-invalid @enderror"
                                   min="0" required>
                            @error("variants.{$index}.count")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="attributes-container mt-2">
                        <label>Атрибуты (размер, цвет и т.д.)</label>
                        <div class="attribute-selects">
                            @php
                                $categoryAttributes = $category->attributes ?? collect();
                            @endphp
                            @foreach($categoryAttributes as $attribute)
                                <div class="mb-2">
                                    <label>{{ $attribute->name }}</label>
                                    <select name="variants[{{$index}}][attribute_values][]"
                                            class="form-control" required>
                                        <option value="">Выберите {{ $attribute->name }}</option>
                                        @foreach($attribute->values as $value)
                                            <option value="{{ $value->id }}"
                                                    @if($variant->attributeValues->contains($value->id)) selected @endif>
                                                {{ $value->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-variant">Удалить вариант</button>
                </div>
            @endforeach
        @else
            <div class="variant-item card mb-3 p-3" data-index="0">
                <h6>Вариант #1</h6>

                <div class="row" style="flex-direction: column; ">
                    <div class="mb-2">
                        <label>Картинки</label>
                        <input type="file"
                               name="variants[0][images][]"
                               class="form-control"
                               multiple accept="image/*"
                               required>
                    </div>
                    <div class="mb-2">
                        <label>Артикул (SKU)</label>
                        <input type="text"
                               name="variants[0][sku]"
                               value="{{ old('variants.0.sku') }}"
                               class="form-control"
                               placeholder="NIKE-001-M-BLACK" required>
                    </div>

                    <div class="mb-2">
                        <label>Цена</label>
                        <input type="number"
                               name="variants[0][price]"
                               value="{{ old('variants.0.price') }}"
                               class="form-control"
                               min="0" step="0.01" required>
                    </div>

                    <div class="mb-2">
                        <label>Старая цена</label>
                        <input type="number"
                               name="variants[0][old_price]"
                               value="{{ old('variants.0.old_price') }}"
                               class="form-control"
                               min="0" step="0.01">
                    </div>

                    <div class="mb-2">
                        <label>Количество</label>
                        <input type="number"
                               name="variants[0][count]"
                               value="{{ old('variants.0.count') }}"
                               class="form-control"
                               min="0" required>
                    </div>
                </div>

                <div class="attributes-container mt-2">
                    <label>Атрибуты (выберите после выбора категории)</label>
                    <div class="attribute-selects"></div>
                </div>

                <button type="button" class="btn btn-sm btn-danger mt-2 remove-variant">Удалить вариант</button>
            </div>
        @endif
    </div>

    <button type="button" class="btn btn-success" id="add-variant">
        <i class="bi bi-plus-circle"></i> Добавить вариант
    </button>
</div>

<script>
    let variantIndex = {{ isset($product) ? $product->variants->count() : 1 }};
    let categoryAttributes = [];

    // Обработка выбора категории
    document.getElementById('category_select').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.dataset.attributes) {
            categoryAttributes = JSON.parse(selectedOption.dataset.attributes);
        } else {
            categoryAttributes = [];
        }

        // Обновляем атрибуты для всех вариантов
        document.querySelectorAll('.variant-item').forEach((variant, idx) => {
            updateVariantAttributes(variant, idx);
        });
    });

    // Добавление нового варианта
    document.getElementById('add-variant').addEventListener('click', function() {
        const container = document.getElementById('variants-container');
        const newVariant = createVariantHTML(variantIndex);
        container.insertAdjacentHTML('beforeend', newVariant);
        variantIndex++;
    });

    // Удаление варианта
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-variant')) {
            if (document.querySelectorAll('.variant-item').length > 1) {
                e.target.closest('.variant-item').remove();
                // Переиндексируем оставшиеся варианты
                reindexVariants();
            } else {
                alert('Должен остаться хотя бы один вариант товара');
            }
        }
    });

    function createVariantHTML(index) {
        let attributesHTML = '';
        if (categoryAttributes.length > 0) {
            categoryAttributes.forEach(attr => {
                attributesHTML += `
                <div class="mb-2">
                    <label>${attr.name}</label>
                    <select name="variants[${index}][attribute_values][]" class="form-control" required>
                        <option value="">Выберите ${attr.name}</option>
                        ${attr.values.map(val => `<option value="${val.id}">${val.value}</option>`).join('')}
                    </select>
                </div>
            `;
            });
        } else {
            attributesHTML = '<div class="alert alert-info">Выберите категорию для отображения атрибутов</div>';
        }

        return `
        <div class="variant-item card mb-3 p-3" data-index="${index}">
            <h6>Вариант #${index + 1}</h6>


            <div class="row" style="flex-direction: column;">
                <div class="mb-2">
                    <label>Картинки</label>
                    <input type="file" name="variants[${index}][images][]" class="form-control" multiple accept="image/*" required>
                </div>
                <div class="mb-2">
                    <label>Артикул (SKU)</label>
                    <input type="text" name="variants[${index}][sku]" class="form-control" placeholder="NIKE-001-M-BLACK" required>
                </div>

                <div class="mb-2">
                    <label>Цена</label>
                    <input type="number" name="variants[${index}][price]" class="form-control" min="0" step="0.01" required>
                </div>

                <div class="mb-2">
                    <label>Старая цена</label>
                    <input type="number" name="variants[${index}][old_price]" class="form-control" min="0" step="0.01">
                </div>

                <div class="mb-2">
                    <label>Количество</label>
                    <input type="number" name="variants[${index}][count]" class="form-control" min="0" required>
                </div>
            </div>

            <div class="attributes-container mt-2">
                <label>Атрибуты (размер, цвет и т.д.)</label>
                <div class="attribute-selects">
                    ${attributesHTML}
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-danger mt-2 remove-variant">Удалить вариант</button>
        </div>
    `;
    }

    function updateVariantAttributes(variantElement, variantIdx) {
        const attributeContainer = variantElement.querySelector('.attribute-selects');
        if (!attributeContainer) return;

        let html = '';
        if (categoryAttributes.length > 0) {
            categoryAttributes.forEach(attr => {
                html += `
                <div class="mb-2">
                    <label>${attr.name}</label>
                    <select name="variants[${variantIdx}][attribute_values][]" class="form-control" required>
                        <option value="">Выберите ${attr.name}</option>
                        ${attr.values.map(val => `<option value="${val.id}">${val.value}</option>`).join('')}
                    </select>
                </div>
            `;
            });
        } else {
            html = '<div class="alert alert-info">Выберите категорию для отображения атрибутов</div>';
        }
        attributeContainer.innerHTML = html;
    }

    function reindexVariants() {
        const variants = document.querySelectorAll('.variant-item');
        variants.forEach((variant, newIndex) => {
            // Обновляем заголовок
            const title = variant.querySelector('h6');
            if (title) {
                title.textContent = `Вариант #${newIndex + 1}`;
            }

            // Обновляем все name атрибуты
            variant.querySelectorAll('[name]').forEach(element => {
                const name = element.getAttribute('name');
                if (name) {
                    const newName = name.replace(/variants\[\d+\]/, `variants[${newIndex}]`);
                    element.setAttribute('name', newName);
                }
            });

            // Обновляем data-index
            variant.setAttribute('data-index', newIndex);
        });

        // Обновляем глобальный индекс
        variantIndex = variants.length;
    }

    // При загрузке страницы, если есть выбранная категория, загружаем ее атрибуты
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_select');
        if (categorySelect && categorySelect.value) {
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            if (selectedOption.dataset.attributes) {
                categoryAttributes = JSON.parse(selectedOption.dataset.attributes);
                document.querySelectorAll('.variant-item').forEach((variant, idx) => {
                    updateVariantAttributes(variant, idx);
                });
            }
        }
    });
</script>
