@extends('layouts.app')

@section('content')
    <div class="basic-container" style="max-width: 80%; border: 0px; margin-top: 20px;">
        <div class="row">
            <div class="col-md-6 position-relative">
                <img src="{{ asset($car->carimages->first()->image) }}" alt="{{ $car->carimages->first()->image }}" class="img-fluid zoom-icon" style="max-width: 100%;" data-bs-toggle="modal" data-bs-target="#largeModal">
                <i class="fa fa-search-plus zoom-icon-overlay"></i>
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
                                        <p>No images available</p>
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
@endsection
