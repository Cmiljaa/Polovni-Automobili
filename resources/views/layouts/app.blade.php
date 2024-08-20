<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #e6e6e6;
        }

        .navbar {
            margin: 0 auto;
            max-width: 1100px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            padding: 20px;
            border: 2px orange solid;
            margin: 20px auto;
            max-width: 72.5%;
        }

        .basic-container {
            padding: 25px 15px;
            border: 2px solid orange;
            border-radius: 2px;
            margin: 30px auto;
            max-width: 40%;
        }

        .car-container {
            background: white;
            padding: 25px;
            margin: 20px auto;
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

        .car-card-body .btn {
            background-color: #ffc107;
            color: rgb(0, 0, 0);
            border: none;
        }
        .car-card-body .btn:hover{
            background-color: rgb(255, 255, 255);
            border: 1px solid #ffc107;
            color: #000;
        }
    </style>
</head>
<body>
    <x-nav-bar/>
    @yield('content')
    @include('partials.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>