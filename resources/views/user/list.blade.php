@extends('layouts.app')
@section('content')
    <div class="car-container">
        <h1>Your Cars</h1>
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="car-card">
                        <img  src="{{ $car->carimages->count() ? asset($car->carimages->first()->image) : asset('storage/images/default.png') }}" alt="Image not loaded">
                    </div>
                    <div class="car-card-body">
                        @if ($car->allowed != 1)
                            <h5 style="color: red">{{$car->brand}}</h5>
                        @else
                            <h5>{{$car->brand}}</h5>
                        @endif
                        <p>{{number_format($car->price, 0, '', '.')}} €</p>
                        <p>{{$car->year}}</p>
                        <a href="{{route('cars.show', $car)}}"><button class="btn btn-show">See More</button></a>
                        <a href="{{route('cars.edit', $car)}}"><button class="btn btn-primary">Edit</button></a>
                        <form action="{{route('cars.destroy', $car)}}" method="POST" class="btn p-0 border-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div>
                    <h3>No cars found</h3>
                    <img src="{{asset('storage/icons/no-car-icon.svg')}}" alt="icon not loaded" style="width: 400px; height: 400px;">
                </div>
            @endforelse

            {{$cars->links()}}
        </div>
    </div>
    
@endsection