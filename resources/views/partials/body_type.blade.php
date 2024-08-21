@php
    $body_types = ['Crossover', 'Covertible', 'Coupe', 'Hatchback', 'Sedan', 'Sports Car', 'SUV', 'Truck', 'Van', 'Wagon'];
@endphp
<label for="body_type" class="form-label">Body Type</label>
<select id="body_type" name="body_type" class="form-select">
    <option value="">All Body Types</option>
    @foreach ($body_types as $body_type)
        <option value="{{$body_type}}" {{ (isset($selectedBodyType) && $selectedBodyType == $body_type) || old('body_type') == $body_type ? 'selected' : '' }}>
            {{$body_type}}
        </option>
    @endforeach
</select>
