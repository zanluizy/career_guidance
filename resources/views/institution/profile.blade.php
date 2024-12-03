@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Profile</h2>
    <form action="{{ route('institution.profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Institution Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $institution->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $institution->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<style>
    body {
        background-color: #1B2A59; /* Deep Blue */
        color: white; /* Text color */
    }

    .container {
        margin-top: 50px; /* Space from the top */
        padding: 20px;
        background-color: #F24C27; /* Gold Orange background for the form container */
        border-radius: 8px; /* Rounded corners for the container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    }

    h2 {
        text-align: center; /* Centered heading */
        color: #FF5900; /* Highlighted color for the heading */
    }

    .form-label {
        font-weight: bold; /* Bold labels */
        color: #ffffff; /* White color for labels */
    }

    .form-control {
        background-color: #ffffff; /* White background for input fields */
        border: 1px solid #ddd; /* Light gray border */
        border-radius: 4px; /* Rounded corners */
        padding: 10px; /* Padding inside the input fields */
        margin-bottom: 15px; /* Space below each input field */
    }

    .btn-primary {
        background-color: #FF5900; /* Gold Orange */
        border: none; /* Remove border */
        padding: 10px 15px; /* Padding for the button */
        border-radius: 5px; /* Rounded corners */
    }

    .btn-primary:hover {
        background-color: #F24C27; /* Darker shade on hover */
    }

    .mb-3 {
        margin-bottom: 1rem; /* Margin bottom for form groups */
    }
</style>
@endsection
