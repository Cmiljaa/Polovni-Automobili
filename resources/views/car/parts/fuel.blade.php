<label for="fuel" class="form-label">Fuel</label>
<select id="fuel" name="fuel" class="form-select">
    <option value="">All Fuels</option>
    @foreach (config('car.fuels') as $fuel)
        <option value="{{$fuel}}" {{ (isset($selectedFuel) && $selectedFuel == $fuel) || old('fuel') == $fuel ? 'selected' : '' }}>
            {{$fuel}}
        </option>
    @endforeach
</select>
