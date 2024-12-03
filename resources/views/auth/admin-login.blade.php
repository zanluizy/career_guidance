@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('https://example.com/background-image.jpg'); /* Replace with your desired background image URL */
        background-size: cover; /* Cover the entire viewport */
        background-repeat: no-repeat; /* No repeat */
        background-position: center; /* Center the image */
        color: white; /* Default text color */
    }

    .login-container {
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
        padding: 10px; /* Add padding inside input fields */
        margin-bottom: 15px; /* Space between input fields */
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
a{
    color:white;
    text-decoration: none;
}
    .btn:hover {
        background-color: #FF8C00; /* Darker orange on hover */
    }

    .icon {
        font-size: 48px; /* Icon size */
        color: #FF5900; /* Gold orange */
        margin-bottom: 20px;
    }

    .additional-links {
        margin-top: 20px;
        color: #FF5900; /* Gold orange */
    }
</style>

<div class="login-container">
    <div class="card">
        <i class="fas fa-user icon" style="font-size: 48px; color: #FF5900; margin-bottom: 20px;"></i> <!-- Font Awesome User Icon -->
        <h2 class="mb-4">{{ __('Login to Your Admin Account') }}</h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">{{ __('Log in') }}</button>
            <div class="home-link">
                <a href="/" style="color: white;">{{ __('Go Home') }}</a>
            </div>
        </form>

        <!-- Additional Links -->
        <div class="additional-links">
            <a href="{{ route('admin.register') }}" style="color: white;">{{ __('Don\'t have an account? Register here') }}</a><br>
            <a href="#" style="color: white;">{{ __('Forgot your password?') }}</a>
        </div>
    </div>
</div>

@endsection
