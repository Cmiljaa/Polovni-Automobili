@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Edit Car</h3>
        <form action="{{route('cars.update', $car)}}" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                @csrf
                @method('PUT')
                @include('car.parts.brand', ['selectedBrand' => $car->brand])
                @error('brand')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.model', ['selectedModel' => $car->model])
                @error('model')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.body_type', ['selectedBodyType' => $car->body_type])
                @error('body_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.mileage', ['selectedMileage' => $car->mileage])
                @error('mileage')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.price', ['selectedPrice' => $car->price])
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-control">
                    @include('car.parts.all_years', ['selectedYear' => $car->year])
                </select>
                @error('year')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.power', ['selectedPower' => $car->power])
                @error('power')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.fuel', ['selectedFuel' => $car->fuel])
                @error('fuel')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.transmission', ['selectedTransmission' => $car->transmission])
                @error('transmission')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.drive_system', ['selectedDriveSystem' => $car->drive_system])
                @error('drive_system')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.cubic_capacity', ['selectedCubicCapacity' => $car->cubic_capacity])
                @error('cubic_capacity')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.number_of_seats', ['selectedNumberOfSeats' => $car->number_of_seats])
                @error('number_of_seats')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                @include('car.parts.door_count', ['selectedDoorCount' => $car->door_count])
                @error('door_count')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="images">Add Photos</label>
                <input type="file" id="images" name="images[]" class="form-control" required accept="image/*" multiple>
                @error('images.*')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Car</button>
        </form>
    </div>
@endsection
<script src="{{asset('js/brands-models.js')}}"></script>