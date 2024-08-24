@extends('layouts.app')
@section('content')

    @include('partials.search')

    <div class="car-container">
        <h1>Cars</h1>
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="car-card">
                        <img src="{{ asset($car->carimages->first()->image) }}" alt="Car Image">
                    </div>
                    <div class="car-card-body">
                        <h5>{{$car->brand}}</h5>
                        <p>{{number_format($car->price, 0, '', '.')}} €</p>
                        <p>{{$car->year}}</p>
                        <a href="{{route('cars.show', $car)}}"><button class="btn btn-show">See More</button></a>
                    </div>
                </div>
            @empty
            <div>
                <h3>No cars found</h3>
                <img src="{{ asset('storage/icons/car-svgrepo-com.svg') }}" alt="icon not loaded" style="width: 400px; height: 400px;">
            </div>
            @endforelse

            {{$cars->links()}}
        </div>
    </div>
    
 
@endsection