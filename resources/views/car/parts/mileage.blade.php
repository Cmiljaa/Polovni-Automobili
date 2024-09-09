<label for="mileage" class="form-label">Mileage</label>
<input type="number" name="mileage" id="mileage" required placeholder="KM" class="form-control" max="2000000" value="{{ old('mileage') ?? $selectedMileage ?? '' }}" >
