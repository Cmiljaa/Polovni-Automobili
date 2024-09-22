<label for="price" class="form-label">{{$label ?? "Price"}}</label>
<input type="number" name="price" id="price" class="form-control" placeholder="Price (€)" value="{{ old('price') ?? $selectedPrice ?? '' }}" min="1">
