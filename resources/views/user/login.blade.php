@extends('layouts.app')

@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Login</h3>
        <form action="{{route('handleLogin')}}" method="POST" class="m-4">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="show_password">
                    <label class="form-check-label" for="show_password">Show Password</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

        <div class="text-center mt-3">
            <p>You don't have an account? <a href="{{route('user.create')}}">Register here</a></p>
        </div>
    </div>
@endsection