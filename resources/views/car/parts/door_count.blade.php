<label for="door_count" class="form-label">{{$label ?? "Door Count"}}</label>
<input type="number" name="door_count" id="door_count" class="form-control" placeholder="Door Count" value="{{ old('door_count') ?? $selectedDoorCount ?? '' }}" min="2" max="5">
