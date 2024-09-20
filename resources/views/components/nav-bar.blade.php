<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('cars.index') }}">
            <span class="fs-3 fw-bold text-dark">Polovni Automobili</span>
        </a>        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0"></ul>

            <ul class="navbar-nav ms-auto">
                @if (Auth::check() && Auth::user()->is_admin)
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary px-3 py-2 shadow-sm w-100">Dashboard</a>
                    </li>
                    <li class="nav-item mx-md-2 mb-2">
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger px-3 py-2 shadow-sm w-100" type="submit">Logout</button>
                        </form>
                    </li>
                @elseif (Auth::check())
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('user.edit', Auth::id())}}" class="btn btn-secondary px-3 py-2 shadow-sm w-100">Your Profile</a>
                    </li>
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('user.list')}}" class="btn btn-primary px-3 py-2 shadow-sm w-100">Your Cars</a>
                    </li>
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('cars.create')}}" class="btn btn-warning px-3 py-2 shadow-sm w-100">Add New Car</a>
                    </li>
                    <li class="nav-item mx-md-2 mb-2">
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger px-3 py-2 shadow-sm w-100" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('login')}}" class="btn btn-success px-3 py-2 shadow-sm w-100">Login</a>
                    </li>
                    <li class="nav-item mx-md-2 mb-2">
                        <a href="{{route('user.create')}}" class="btn btn-primary px-3 py-2 shadow-sm w-100">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@include('partials.messages')
