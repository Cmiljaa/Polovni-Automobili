<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Polovni Automobili</title>
    <link rel="icon" href="{{asset('storage/icons/car-svgrepo-com.svg')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    body {
        background: #e6e6e6;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }
    
    .main-container {
        flex: 1;
    }
    
    .search-container {
        display: flex;
        justify-content: center;
        padding: 20px;
        border: 2px orange solid;
        margin: 35px auto;
        max-width: 72.5%;
        border-radius: 8px;
    }
    
    .basic-container {
        max-width: 600px;
        margin: 0 auto;
        margin-top: 35px;
        padding: 30px 20px;
        border: 2px solid orange;
        border-radius: 8px;
    }

    .message-container {
        display: flex;
        justify-content: center;
        margin: 20px auto -20px;
        width: 100%;
        padding: 0 15px;
    }

    .alert {
        max-width: 1100px;
        width: 100%;
    }

    @media (max-width: 768px) {

        .message-container {
            margin: 15px auto -15px;
            padding: 0 10px;
        }

        .alert {
            max-width: 100%;
            width: 100%;
        }

        .basic-container {
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px;
        }

        .search-container{
            max-width: 90%;
            margin-top: 35px;
        }
        .w-75 {
            width: 100%;
        }

        .row > div {
            margin-top:  0px;
            margin-bottom: 15px;
        }
    }
    
    .car-container {
        background: white;
        padding: 25px;
        margin: 35px auto;
        margin-bottom: 50px;
        max-width: 1100px;
    }
    
    .car-card {
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    .car-card img {
        width: 350px;
        height: 250px;
    }
    
    .car-card-body {
        padding: 15px;
    }
    
    .car-card-body h5 {
        margin: -5px 0;
        font-weight: bold;
    }
    
    .car-card-body p {
        margin: 5px 0;
        color: #303131;
    }
    
    .car-card-body .btn-show {
        background-color: #ffc107;
        color: rgb(0, 0, 0);
        border: none;
    }
    
    .car-card-body .btn-show:hover {
        background-color: rgb(255, 255, 255);
        border: 1px solid #ffc107;
        color: #000;
    }

    .position-relative {
        position: relative;
    }
    
    .zoom-icon-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem;
        color: rgba(255, 255, 255, 0.8);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .position-relative:hover .zoom-icon-overlay {
        opacity: 1;
    }

    .footer-container {
        flex: 1;
    }

    footer {
        margin-top: auto;
    }

    .centered-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .img-size{
        height: 450px;
        width: 700px;
        background-size: cover;
        overflow: hidden;
    }

    .modal-content {
        width: 700px;
        border:none;
    }

    .modal-body {
        padding: 0;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        width: 30px;
        height: 48px;
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        width: 30px;
        height: 48px;
    }

    .intro {
        height: 100%;
    }

    table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    thead th {
        color: #fff;
    }

    .card {
        border-radius: .5rem;
    }

    .table-scroll {
        border-radius: .5rem;
    }

    .table-scroll table thead th {
        
    }

    thead {
        top: 0;
        position: sticky;
    }

    </style>
    
</head>
<body>
    <x-nav-bar />
    <div class="main-container">
        @yield('content')
    </div>
    @include('partials.footer')
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
