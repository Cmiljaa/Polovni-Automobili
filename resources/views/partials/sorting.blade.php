@if ($cars->count())
    <form action="{{route('cars.filter')}}">
        <input type="hidden" value="{{request('brand')}}" name="brand">
        <input type="hidden" value="{{request('price')}}" name="price">
        <input type="hidden" value="{{request('fuel')}}" name="fuel">
        <input type="hidden" value="{{request('year_from')}}" name="year_from">
        <input type="hidden" value="{{request('year_to')}}" name="year_to">
        <input type="hidden" value="{{request('body_type')}}" name="body_type">
        <label for="sort" class="form-label">Sort by:</label>
        <select name="sort" id="sort" class="form-select sort" onchange="this.form.submit()">
            @foreach (config('car.sorting') as $sorting_key => $label)
                <option value="{{$sorting_key}}"  {{ (isset($selectedSort) && $selectedSort == $sorting_key) || old('sort') == $sorting_key ? 'selected' : '' }}>{{$label}}</option>
            @endforeach
        </select>
    </form>
@endif