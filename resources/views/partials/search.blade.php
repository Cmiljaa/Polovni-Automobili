<div class="search-container">
    <div class="w-75"> 
        <h3 class="text-center mb-4">Search Car</h3>
        <form>
            <div class="row mb-3">
                @include('partials.brand')
                @include('partials.price')
                @include('partials.fuel')
            </div>

            <div class="row mb-3">
                @include('partials.year_from')
                @include('partials.year_to')
                @include('partials.body_type')
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </form>
    </div>
</div>