<div class="search-container">
    <div class="w-75"> 
        <h3 class="text-center mb-4">Search Car</h3>
        <form action="{{route('cars.filter')}}" method="GET">
            <div class="row mb-3">
                <div class="col-md-4">
                    @include('car.parts.brand', ['selectedBrand' => request('brand')])
                </div>
                <div class="col-md-4">
                    @include('car.parts.price', ['label'=>'Price up to', 'selectedPrice' => request('price')])
                </div>
                <div class="col-md-4">
                    @include('car.parts.fuel', ['selectedFuel' => request('fuel')])
                </div>
            </div>

            <div class="row mb-3">
                @include('car.parts.year_from', ['selectedYear' => request('year_from')])
                @include('car.parts.year_to', ['selectedYear' => request('year_to')])
                <div class="col-md-4">
                    @include('car.parts.body_type', ['selectedBodyType' => request('body_type')])
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </form>
    </div>
</div>