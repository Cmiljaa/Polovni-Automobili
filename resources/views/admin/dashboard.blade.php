@extends('layouts.app')
@section('content')

<div class="car-container">
    <h3 class="da mb-3">All Users</h3>
    <section class="intro" style="background-color: #f5f7fa;">
        <div class="container">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-scroll" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-striped mb-0">
                            <thead style="background-color: #002d72;">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <form action="{{route('user.destroy', $user)}}" method="POST" class="btn p-0 border-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Users Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h3 class="da mt-5">All Cars</h3>
    <section class="intro" style="background-color: #f5f7fa;">
        <div class="container">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-scroll" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-striped mb-0">
                            <thead style="background-color: #002d72;">
                                <tr>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Mileage</th>
                                    <th scope="col">Allow</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cars as $car)
                                    <tr>
                                        <td>{{ $car->user->name }}</td>
                                        <td><a href="{{route('cars.show', $car)}}">View Car</a></td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->year }}</td>
                                        <td>{{number_format($car->price, 0, '', ',')}} €</td>
                                        <td>{{number_format($car->mileage, 0, '', '.')}} km</td>
                                        @if($car->allowed != 0)
                                            <td>
                                                <form action="{{ route('admin.allow', ['car' => $car, 'allowed' => 'false']) }}" method="POST" class="btn p-0 border-0">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-danger" type="submit">Unallow</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form action="{{ route('admin.allow', ['car' => $car, 'allowed' => 'true']) }}" method="POST" class="btn p-0 border-0">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">Allow</button>
                                                </form>
                                            </td>
                                        @endif
                                        <td>
                                            <form action="{{route('cars.destroy', $car)}}" method="POST" class="btn p-0 border-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Cars Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection