<label for="number_of_seats" class="form-label">{{$label ?? "Number of Seats"}}</label>
<input type="number" name="number_of_seats" id="number_of_seats" class="form-control" placeholder="Number of Seats" value="{{ old('number_of_seats') ?? $selectedNumberOfSeats ?? '' }}" min="2" max="7">
