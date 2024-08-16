@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Add New Car</h3>
        <form action="" class="m-4">
            <form method="POST">
                <div class="mb-3">
                    @include('partials.brand')
                </div>
                <div class="mb-3">
                    @include('partials.price', ['label'=>'Price'])
                </div>
                <div class="mb-3">
                    @include('partials.fuel')
                </div>
                <div class="mb-3">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        @include('partials.all_years')
                    </select>
                </div>
                <div class="mb-3">
                    @include('partials.body_type')
                </div>
                <div class="mb-3">
                    <label for="photo">Add Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Car</button>
            </form>
        </form>
    </div>
@endsection