@php
    $sorting = [
        'created_at,desc' => 'Latest',
        'price,asc' => 'Price: Low to High',
        'price,desc' => 'Price: High to Low',
        'year,asc' => 'Year: Old to New',
        'year,desc' => 'Year: New to Old'
    ];
@endphp

@if ($cars->count())
    <form action="{{route('cars.filter')}}">
        <input type="hidden" value="{{request('brand')}}">
        <input type="hidden" value="{{request('price')}}">
        <input type="hidden" value="{{request('fuel')}}">
        <input type="hidden" value="{{request('year_from')}}">
        <input type="hidden" value="{{request('year_to')}}">
        <input type="hidden" value="{{request('body_type')}}">
        <label for="sort" class="form-label">Sort by:</label>
        <select name="sort" id="sort" class="form-select sort" onchange="this.form.submit()">
            @foreach ($sorting as $sorting_key => $label)
                <option value="{{$sorting_key}}"  {{ (isset($selectedSort) && $selectedSort == $sorting_key) || old('sort') == $sorting_key ? 'selected' : '' }}>{{$label}}</option>
            @endforeach
        </select>
    </form>
@endif