@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Add New Car</h3>
            <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    @include('partials.brand')
                    @error('brand')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('partials.model')
                    @error('model')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('partials.mileage')
                    @error('mileage')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('partials.price', ['label'=>'Price'])
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('partials.fuel')
                    @error('fuel')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        @include('partials.all_years')
                    </select>
                    @error('year')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('partials.body_type')
                    @error('body_type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Add Photo</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Car</button>
            </form>
    </div>
@endsection