@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('Register a New Institution') }}</h2>
    <div class="card shadow-sm p-4" style="max-width: 500px; margin: 0 auto;">
        <form method="POST" action="{{ route('institution.register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <label for="name">{{ __('Institution Name') }}</label>
                <input type="text" name="name" class="form-control" required autofocus>
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group mb-3">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>

            <div class="home-link">
                <a href="/" style="color: white;">{{ __('Go Home') }}</a>
            </div>
        </form>
    </div>
</div>

<style>
       body {
        background-image: url('https://example.com/background-image.jpg'); /* Replace with your desired background image URL */
        background-size: cover; /* Cover the entire viewport */
        background-repeat: no-repeat; /* No repeat */
        background-position: center; /* Center the image */
        color: white; /* Default text color */
    }

    .registration-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full viewport height */
        padding: 20px;
    }

    .card {
        background-color: rgba(27, 42, 89, 0.9); /* Semi-transparent deep blue */
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px; /* Limit the width */
        text-align: center;
    }

    .form-label {
        color: #FF5900; /* Gold orange */
        margin-bottom: 8px; /* Add margin below labels */
        font-weight: bold; /* Make labels bold */
    }

    .form-control {
        border-radius: 5px; /* Rounded corners for input fields */
        border: 1px solid #FF5900; /* Gold orange border */
        padding: 12px; /* Add padding inside input fields */
        margin-bottom: 15px; /* Space between input fields */
        width: 100%; /* Make fields 100% width of their container */
        box-sizing: border-box; /* Include padding and border in element's total width */
    }

    .btn {
        background-color: #F24C27; /* Gold Orange */
        color: white;
        border: none;
        width: 100%;
        border-radius: 5px;
        padding: 10px;
        font-weight: bold; /* Make button text bold */
    }

    .btn:hover {
        background-color: #FF8C00; /* Darker orange on hover */
    }

    .home-link {
        margin-top: 15px;
        color: #FF5900; /* Gold orange */
    }
</style>

@endsection
