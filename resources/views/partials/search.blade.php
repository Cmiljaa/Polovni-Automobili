<div class="search-container">
    <div class="w-75"> 
        <h3 class="text-center mb-4">Search Car</h3>
        <form action="{{route('cars.filter')}}" method="GET">
            <div class="row mb-3">

                <div class="col-md-4">
                    @include('car.parts.brand', ['selectedBrand' => request('brand')])
                </div>

                <div class="col-md-4">
                    @include('car.parts.model', ['selectedModel' => request('model')])
                </div>

                <div class="col-md-4">
                    @include('car.parts.price', ['label'=>'Price up to', 'selectedPrice' => request('price')])
                </div>
                
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    @include('car.parts.year_from', ['selectedYear' => request('year_from')])
                </div>
                <div class="col-md-4">
                    @include('car.parts.year_to', ['selectedYear' => request('year_to')])
                </div>
                <div class="col-md-4">
                    @include('car.parts.body_type', ['selectedBodyType' => request('body_type')])
                </div>
            </div>

            <div class="collapse" id="collapseExample">
                <div class="row mb-3">
                    <div class="col-md-3">
                        @include('car.parts.power', ['selectedPower' => request('power')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.transmission', ['selectedTransmission' => request('transmission')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.drive_system', ['selectedDriveSystem' => request('drive_system')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.fuel', ['selectedFuel' => request('fuel')])
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        @include('car.parts.mileage', ['selectedMileage' => request('mileage')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.cubic_capacity', ['selectedCubicCapacity' => request('cubic_capacity')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.number_of_seats', ['selectedNumberOfSeats' => request('number_of_seats')])
                    </div>
                    <div class="col-md-3">
                        @include('car.parts.door_count', ['selectedDoorCount' => request('door_count')])
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" ata-bs-toggle="collapse" data-bs-target="#collapseExample" class="btn btn-warning">Search</button>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Advanced Search
                </a>
            </div>            
        </form>
    </div>
</div>
