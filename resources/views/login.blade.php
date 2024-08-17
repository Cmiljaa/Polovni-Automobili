@extends('layouts.app')
@section('content')
    <div class="basic-container mb-5">
        <h3 class="text-center mb-4">Login</h3>
        <form action="{{route('user.login')}}" method="POST" class="m-4">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    @isset($email)
                        <p class="text-danger">{{$email}}</p>
                    @endisset
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </form>
    </div>
@endsection