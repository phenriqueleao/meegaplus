<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand mb-0 h1" href="{{ url('/') }}">MEEGA+</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer fixed-bottom navbar navbar-dark bg-primary">
        <div class="container">
            <p class="mx-auto">Copyright &copy; 2020</p>
        </div>
    </footer>
</body>
</html>