<label for="transmission" class="form-label">Transmission</label>
<select id="transmission" name="transmission" class="form-select">
    <option value="">All Transmissions</option>
    @foreach (config('car.transmissions') as $transmission)
        <option value="{{$transmission}}" {{ (isset($selectedTransmission) && $selectedTransmission == $transmission) || old('transmission') == $transmission ? 'selected' : '' }}>
            {{$transmission}}
        </option>
    @endforeach
</select>