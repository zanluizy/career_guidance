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

    .register-container {
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

    .btn:hover {
        background-color: #FF8C00; /* Darker orange on hover */
    }

    .additional-links {
        margin-top: 20px;
        color: #FF5900; /* Gold orange */
    }
</style>

<div class="register-container">
    <div class="card">
        <h2 class="mb-4">{{ __('Register a New Admin Account') }}</h2>
        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" required autofocus>
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">{{ __('Register') }}</button>

            <div class="home-link">
                <a href="/" style="color: white;">{{ __('Go Home') }}</a>
            </div>
        </form>

        <!-- Additional Links -->
        <div class="additional-links">
            <a href="{{ route('admin.login') }}" style="color: white;">{{ __('Already have an account? Login here') }}</a>
        </div>
    </div>
</div>

@endsection
