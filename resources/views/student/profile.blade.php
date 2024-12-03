@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; width:600px;">
    <div class="card p-5 shadow-lg" style="width: 100%; max-width: 600px; background-color: #1B2A59; color: white; border-radius: 10px;">
        <!-- Back to Dashboard Button -->
        <div class="mb-3">
            <a href="{{ route('student.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration: none; padding: 10px 20px; border-radius: 20px;">
                Back to Dashboard
            </a>
        </div>

        <h2 class="text-center mb-4" style="color: #FF5900;">Edit Profile</h2>

        <!-- Edit Profile Form -->
        <form action="{{ route('student.profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="first_name" class="form-label" style="color: #FF5900;">First Name</label> <br><br>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" required style="border: 1px solid #FF5900;width:600px;">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label" style="color: #FF5900;">Last Name</label><br><br>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" required style="border: 1px solid #FF5900;width:600px;">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label" style="color: #FF5900;">Email</label><br><br>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required style="border: 1px solid #FF5900;width:600px;">
            </div><br><br>

            <button type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #FF5900; border: none; padding: 15px; font-size: 18px; border-radius:20px;">Update Profile</button>
        </form>
    </div>
</div>

<style>
    /* Center the form card */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Full viewport height */
    }

    /* Form input styling */
    .form-control {
        padding: 15px;
        border-radius: 8px;
        background-color: #333; /* Darker background for input fields */
        color: white;
        font-size: 16px;
    }

    /* Button hover effect */
    .btn-primary:hover {
        background-color: #FF8C00; /* Darker orange */
        transform: translateY(-2px); /* Slight lift on hover */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* Title styling */
    h2 {
        color: #FF5900;
        font-weight: bold;
    }

    /* Shadow on form card */
    .card {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        padding: 40px; /* Increase padding for larger feel */
    }
</style>
@endsection
