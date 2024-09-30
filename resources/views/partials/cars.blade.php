@forelse ($cars as $car)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="car-card">
            <img  src="{{ $car->carimages->count() ? asset($car->carimages->first()->image) : asset('storage/images/default.png') }}" alt="Image not loaded">
        </div>
        <div class="car-card-body">
            <h5>{{$car->brand}} {{$car->model}}</h5>
            <p>{{number_format($car->price, 0, '', ',')}} €</p>
            <p>{{$car->year}}</p>
            <a href="{{route('cars.show', $car)}}"><button class="btn btn-show">See More</button></a>
        </div>
    </div>
@empty
<div>
    <h3>No cars found</h3>
    <img src="{{asset('storage/icons/no-car-icon.svg')}}" alt="icon not loaded" style="width: 400px; height: 400px;">
</div>
@endforelse