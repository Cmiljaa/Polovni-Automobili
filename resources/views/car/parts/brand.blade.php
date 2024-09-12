<label for="brand" class="form-label">Brand</label>
<select id="brand" class="form-select" name="brand" onchange="updateModels(this.value)">
    <option value="">All Brands</option>
    @foreach (config('brands') as $brand => $models)
        <option value="{{ $brand }}">{{ $brand }}</option>
    @endforeach
</select>