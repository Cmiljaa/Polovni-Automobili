@extends('layouts.app')
@section('content')

    @include('partials.search')

    <div class="car-container">
        <h2>Cars</h2>
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="car-card">
                        <img src="{{$car->image}}" alt="Photo not loaded">
                    </div>
                    <div class="car-card-body">
                        <h5>{{$car->brand}}</h5>
                        <p>{{number_format($car->price, 0, '', '.')}} €</p>
                        <p>{{$car->year}}</p>
                        <a href="{{route('cars.show', $car)}}"><button class="btn">See More</button></a>
                    </div>
                </div>
            @empty
                <p>No cars available.</p>
            @endforelse
        </div>
    </div>
    
 
@endsection