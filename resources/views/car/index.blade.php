@extends('layouts.app')
@section('content')

    @include('partials.search')

    <div class="car-container">
        <h1>Cars</h1>
        @include('partials.sorting', ['selectedSort' => request('sort')])

        <div class="row">
            @include('partials.cars')
            {{$cars->links()}}
        </div>
    </div>
    
@endsection