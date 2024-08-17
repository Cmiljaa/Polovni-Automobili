<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('cars.index')}}">Polovni Automobili</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <div class="d-flex">
                <a href="{{route('user.showLoginForm')}}" class="me-2">
                    <button class="btn btn-success">Login</button>
                </a>
                <a href="{{route('user.create')}}">
                    <button class="btn btn-primary">Register</button>
                </a>
            </div>
        </div>
    </div>
</nav>