@extends('layouts.app')
@section('content')

    @include('partials.search')

    <div class="car-container">
        <h1>Cars</h1>
        <form action="{{route('cars.filter')}}">
            <input type="hidden" value="{{request('brand')}}">
            <input type="hidden" value="{{request('price')}}">
            <input type="hidden" value="{{request('fuel')}}">
            <input type="hidden" value="{{request('year_from')}}">
            <input type="hidden" value="{{request('year_to')}}">
            <input type="hidden" value="{{request('body_type')}}">
            <label for="sort" class="form-label">Sort by:</label>
            <select name="sort" id="sort" class="form-select sort" onchange="this.form.submit()">
                <option value="created_at,desc" selected>Latest</option>
                <option value="price,asc">Price: Low to High</option>
                <option value="price,desc">Price: High to Low</option>
                <option value="year,asc">Year: Old to New</option>
                <option value="year,desc">Year: New to Old</option>
            </select>
        </form>
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="car-card">
                        <img  src="{{ $car->carimages->count() ? asset($car->carimages->first()->image) : asset('storage/images/default.png') }}" alt="Image not loaded">
                    </div>
                    <div class="car-card-body">
                        <h5>{{$car->brand}} {{$car->model}}</h5>
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