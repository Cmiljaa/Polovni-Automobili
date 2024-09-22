<label for="mileage" class="form-label">{{$label ?? "Mileage"}}</label>
<input type="number" name="mileage" id="mileage" placeholder="KM" class="form-control" max="2000000" value="{{ old('mileage') ?? $selectedMileage ?? '' }}" min="0">
