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
            background-color: black;
            color: white;
            font-family: 'Figtree', sans-serif;
        }
a{
    text-decoration: none;
}
li{
    list-style-type: none;
}
        .navbar {
            background-color: #FF5900; /* Navbar background */
        }

        .nav-link {
            color: white;
            margin: 0 15px; /* Spacing between links */
            font-weight: bold; /* Make links bold */
        }

        .nav-link:hover {
            color: #ff8c00; /* Color on hover */
            text-decoration: underline; /* Underline on hover */
        }

        .btn-primary {
            background-color: orange;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff8c00;
        }

        .welcome-header {
            text-align: center;
            margin-top: 50px;
        }

        /* Flex styles for navbar positioning */
        .navbar-nav {
            display: flex;
            justify-content: flex-end; /* Align to the right */
            margin-left: auto; /* Push items to the right */
        }

        .navbar-collapse {
            justify-content: flex-end; /* Align collapse items to the right */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Career Guidance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.login') }}">Students Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('institution.login') }}">Institutions Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admins Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome-header">
        <h1>Welcome to the Career Guidance Web Application</h1>
        <p>Explore higher learning institutions, faculties, and courses.</p>
        <div class="text-center">
            <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
