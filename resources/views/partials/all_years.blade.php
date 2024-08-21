<option value="">All Years</option>
@for ($i = 2024; $i >= 1960; $i--)
    <option value="{{ $i }}" {{ (isset($selectedYear) && $selectedYear == $i) || old('year') == $i ? 'selected' : '' }}>
        {{ $i }}
    </option>
@endfor