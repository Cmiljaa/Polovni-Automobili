@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Edit Car</h3>
        <form action="{{route('cars.update', $car)}}" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                @csrf
                @method('PUT')
                @include('partials.brand', ['selectedBrand' => $car->brand])
                @error('brand')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('partials.model', ['selectedModel' => $car->model])
                @error('model')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('partials.mileage', ['selectedMileage' => $car->mileage])
                @error('mileage')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('partials.price', ['label' => 'Price', 'selectedPrice' => $car->price])
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('partials.fuel', ['selectedFuel' => $car->fuel])
                @error('fuel')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-control">
                    @include('partials.all_years', ['selectedYear' => $car->year])
                </select>
                @error('year')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('partials.body_type', ['selectedBodyType' => $car->body_type])
                @error('body_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Update Photo</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Car</button>
        </form>
    </div>
@endsection
