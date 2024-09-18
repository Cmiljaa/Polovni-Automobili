<label for="model" class="form-label">Model</label>
<select id="model" class="form-select" name="model" disabled>
    @foreach (config('car.brands') as $brand => $models)
        @foreach ($models as $model)
            <option data-option="{{ $brand }}" {{ (isset($selectedModel) && $selectedModel == $model) || old('model') == $model ? 'selected' : '' }}>{{ $model }}</option>
        @endforeach
    @endforeach
</select>