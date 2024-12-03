<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career Guidance</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Styles -->
    <style>
        body {
            background-color: black; /* Background color */
            color: white; /* Default text color */
            font-family: 'Figtree', sans-serif; /* Custom font */
        }

        .navbar {
            background-color: #FF5900; /* Navbar background */
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: #ff8c00;
        }

        .btn-primary {
            background-color: orange;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff8c00;
        }
    </style>
</head>
<body>


    <div class="container">
        @yield('content') <!-- This is where the content of your views will be injected -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
