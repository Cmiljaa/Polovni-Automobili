@extends('layouts.app')

@section('content')
    <div class="basic-container text-center mt-1" style="max-width: 80%; border: 0px;">
        <h1 class="text-center">{{$car->brand}} {{$car->model}}</h1>
        <div class="d-flex justify-content-center">
            <div class="image-box position-relative">
                <img src="{{ $car->carimages->count() ? asset($car->carimages->first()->image) : asset('storage/images/default.png') }}" 
                    alt="Image not loaded" 
                    class="img-fluid zoom-icon" 
                    data-bs-toggle="modal" 
                    data-bs-target="#largeModal">
                <i class="fa fa-search-plus zoom-icon-overlay"></i>
            </div>
        </div>
    </div>

    <div class="info-container">
        <div class="row">
            <div class="col">
                <p><strong>Price:</strong> {{ number_format($car->price, 0, '', '.') }} €</p>
                <p><strong>Mileage:</strong> {{number_format($car->mileage, 0, '', '.')}} km</p>
                <p><strong>Year:</strong> {{ $car->year }}.</p>
            </div>
            <div class="col">
                <p><strong>Power:</strong> {{$car->power}} hp</p>
                <p><strong>Fuel:</strong> {{$car->fuel}}</p>
                <p><strong>Transmission:</strong> {{$car->transmission}}</p>
            </div>
        </div>
    </div>

    <div class="collapse" id="collapseExample">
        <div class="info-container mt-0 mb-3">
            <div class="row">
                <div class="col">
                    <p><strong>Drive System:</strong> {{$car->drive_system}}</p>
                    <p><strong>Cubic Capacity:</strong> {{$car->cubic_capacity}} cm<sup>3</sup></p>
                    <p><strong>Number of Seats:</strong> {{$car->number_of_seats}} seats</p>
                </div>
                <div class="col">
                    <p><strong>Body type:</strong> {{$car->body_type}}</p>
                    <p><strong>Door Count:</strong> {{$car->door_count}} doors</p>
                    <p><strong>Phone:</strong> {{ $car->user->phone }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <a data-bs-toggle="collapse" href="#collapseExample" role="button" style="display: flex; justify-content:center; color:#ffc107; font-size: 20px;">
        Show more
    </a>

    <div class="container">
        <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                @foreach ($car->carimages as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @forelse ($car->carimages as $index => $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset($image->image) }}" alt="{{ $image->image }}" class="d-block w-100">
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/images/default.png') }}" alt="{{asset('storage/images/default.png')}}" class="d-block w-100">
                                    </div>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="car-container">
        <h3>More Cars From This User</h3>
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
        </div>
    </div>
@endsection
