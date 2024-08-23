@extends('layouts.app')
@section('content')
    <div class="basic-container" style="max-width: 80%; border: 0px; margin-top: 20px;">
        <div class="row">
            <div class="col-md-6 position-relative">
                <img src="{{ asset($car->image) }}" alt="{{ $car->image }}" class="img-fluid zoom-icon" style="max-width: 100%;" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{$car->brand}} {{$car->model}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <img src="{{ asset($car->image) }}" alt="{{ $car->image }}" class="img-fluid centered-image">
                </div>
            </div>
        </div>
    </div>
    
@endsection