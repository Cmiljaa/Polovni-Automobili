<div class="search-container">
    <div class="w-75"> 
        <h3 class="text-center mb-4">Search Car</h3>
        <form>
            <div class="row mb-3">
                <div class="col-md-4">
                    @include('partials.brand')
                </div>
                <div class="col-md-4">
                    @include('partials.price', ['label'=>'Price up to'])
                </div>
                <div class="col-md-4">
                    @include('partials.fuel')
                </div>
            </div>

            <div class="row mb-3">
                @include('partials.year_from')
                @include('partials.year_to')
                <div class="col-md-4">
                    @include('partials.body_type')
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </form>
    </div>
</div>