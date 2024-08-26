@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Edit Profile</h3>
        <form method="POST" action="{{route('user.update', $user)}}" class="m-4">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Henry Collins" value="{{old('name') ?? $user->name}}">                                                     
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{old('email') ?? $user->email}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="1234567890" value="{{old('phone') ?? $user->phone}}">
                @error('phone')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
@endsection