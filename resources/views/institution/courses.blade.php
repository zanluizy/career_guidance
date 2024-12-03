@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #1B2A59; color: white; padding: 20px;">
<div class="mb-3">
    <a href="{{ route('institution.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <Br>
    <h2 class="mt-3">Manage Courses</h2>

    <!-- Add Course Form -->
    <form action="{{ route('institution.courses.add') }}" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="form-group">
            <label for="courseName" style="color: white;">Course Name</label>
            <input type="text" id="courseName" name="name" class="form-control" required style="border: 1px solid #FF5900; padding: 8px; border-radius: 5px;">
        </div>
<br>
        <div class="form-group">
            <label for="facultyId" style="color: white;">Select Faculty</label>
            <select id="facultyId" name="faculty_id" class="form-control" required style="border: 1px solid #FF5900;">
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2" style="background-color: #FF5900; border: none;">Add Course</button>
    </form>

    <!-- List of Courses -->
    <h3 class="mt-4">Courses</h3>
    <ul class="list-group" style="background-color: #1B2A59; color: white;">
        @foreach($courses as $course)
            <li class="list-group-item" style="background-color: #1B2A59; color: white;">{{ $course->name }} (Faculty ID: {{ $course->faculty_id }})</li>
        @endforeach
    </ul>

    <style>
    .table {
        border-radius: 8px; /* Rounded corners for the table */
        overflow: hidden;
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: left;
        vertical-align: middle;
    }

    .btn-warning:hover {
        background-color: #e69500; /* Darker shade on hover */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Darker red on hover */
    }

    .table-hover tbody tr:hover {
        background-color: #333f66; /* Darker shade on row hover */
    }

    form {
        margin-top: 20px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Customize the input field */
    .form-control {
        box-shadow: none; /* Remove default shadow */
        transition: border-color 0.3s, background-color 0.3s;
    }

    .form-control:focus {
        border-color: #FF8C00; /* Change border on focus */
        background-color: #444; /* Slightly lighter background */
        outline: none;
    }

    /* Style the submit button */
    .btn-primary {
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15); /* Add a subtle shadow */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #e67e00; /* Darken the button on hover */
        transform: translateY(-2px); /* Add a slight "lift" effect */
    }

    /* Label styling */
    .form-label {
        font-size: 14px;
        letter-spacing: 1px;
    }
</style>
</div>
@endsection
