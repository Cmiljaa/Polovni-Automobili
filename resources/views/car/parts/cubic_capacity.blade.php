<label for="cubic_capacity" class="form-label">{{$label}}</label>
<input type="number" name="cubic_capacity" id="cubic_capacity" class="form-control" placeholder="Cubic Capacity" value="{{ old('cubic_capacity') ?? $selectedCubicCapacity ?? '' }}" min="100">
