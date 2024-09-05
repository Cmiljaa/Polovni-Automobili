<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('cars.index')}}">Polovni Automobili</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0"></ul>

            <ul class="navbar-nav ms-auto">
                @if (Auth::check() && Auth::user()->is_admin)
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary me-2 m-1">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger m-1" type="submit">Logout</button>
                        </form>
                    </li>
                @elseif (Auth::check())
                    <li class="nav-item">
                        <a href="{{route('user.edit', Auth::id())}}" class="btn btn-info me-2 m-1">Your Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.list')}}" class="btn btn-primary me-2 m-1">Your Cars</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cars.create')}}" class="btn btn-warning me-2 m-1">Add New Car</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger m-1" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="btn btn-success me-2 m-1">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.create')}}" class="btn btn-primary m-1">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@include('partials.messages')