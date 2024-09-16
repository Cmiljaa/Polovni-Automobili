@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Add New Car</h3>
            <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    @include('car.parts.brand')
                    @error('brand')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.model')
                    @error('model')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.body_type')
                    @error('body_type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.mileage')
                    @error('mileage')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.price', ['label'=>'Price'])
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        @include('car.parts.all_years')
                    </select>
                    @error('year')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.power')
                    @error('power')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.fuel')
                    @error('fuel')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.transmission')
                    @error('transmission')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.drive_system')
                    @error('drive_system')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.cubic_capacity')
                    @error('cubic_capacity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.number_of_seats')
                    @error('number_of_seats')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('car.parts.door_count')
                    @error('door_count')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="images">Add Photos</label>
                    <input type="file" id="images" name="images[]" class="form-control" required accept="image/*" multiple>
                    @error('images.*')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Add Car</button>
            </form>
    </div>
@endsection
<script src="{{asset('js/brands-models.js')}}"></script>