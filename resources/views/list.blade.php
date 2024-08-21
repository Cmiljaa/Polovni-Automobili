@extends('layouts.app')
@section('content')
    <div class="car-container">
        <h2>Cars</h2>
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="car-card">
                        <img src="{{asset($car->image)}}" alt="Photo not loaded">
                    </div>
                    <div class="car-card-body">
                        <h5>{{$car->brand}}</h5>
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
                <p>No cars available.</p>
            @endforelse

            {{$cars->links()}}
        </div>
    </div>
    
@endsection