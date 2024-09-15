<label for="power" class="form-label">{{$label}}</label>
<input type="number" name="power" id="power" class="form-control" placeholder="Power (hp)" value="{{ old('power') ?? $selectedPower ?? '' }}" min="0">
