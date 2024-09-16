<label for="power" class="form-label">Power</label>
<input type="number" name="power" id="power" class="form-control" placeholder="Power (hp)" value="{{ old('power') ?? $selectedPower ?? '' }}" min="1">
