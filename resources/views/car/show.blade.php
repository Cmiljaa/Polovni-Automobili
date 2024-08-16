@extends('layouts.app')
@section('content')
    <div class="basic-container" style="max-width: 80%; border: 0px; margin-top: 20px;">
        <div class="row">
            <div class="col-md-6">
                <img src="{{$car->image}}" alt="{{ $car->brand }}" class="img-fluid" style="max-width: 100%;">
            </div>
            <div class="col-md-6" style="font-size: 18px">
                <h3>{{ $car->brand }}</h3>
                <p><strong>Price:</strong> {{ number_format($car->price, 0, '', '.') }} €</p>
                <p><strong>Year:</strong> {{ $car->year }}</p>
                <p><strong>Fuel:</strong> {{ Str::ucfirst($car->fuel) }}</p>
                <p><strong>Body Type:</strong> {{ Str::ucfirst($car->body_type) }}</p>
                <p><strong>Phone:</strong> {{ $car->user->phone }}</p>
            </div>
        </div>
    </div>
@endsection