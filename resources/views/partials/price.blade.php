<label for="price" class="form-label">{{$label}}</label>
<input type="number" name="price" id="price" class="form-control" placeholder="Price (€)" value="{{ old('price') ?? $selectedPrice ?? '' }}">
